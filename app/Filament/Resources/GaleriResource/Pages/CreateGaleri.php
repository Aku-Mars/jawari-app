<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Filament\Actions\Action;
use Illuminate\Support\Js;

class CreateGaleri extends CreateRecord
{
    protected static string $resource = GaleriResource::class;
    protected ?string $subheading = 'Tambah Galeri Baru';

    public function getTitle(): string
    {
        return 'Tambah Galeri';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah Galeri';
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label('Simpan')
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Galeri berhasil dibuat dan gambar dioptimasi';
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return Action::make('createAnother')
            ->label('Simpan dan Tambah lainnya')
            ->action('createAnother')
            ->keyBindings(['mod+shift+s'])
            ->color('gray');
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label('Batal')
            ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = ' . Js::from($this->previousUrl ?? static::getResource()::getUrl()) . ')')
            ->color('gray');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Set user_id
        $data['user_id'] = Auth::id();

        // Debug: Log data yang masuk
        logger()->info('Data sebelum konversi:', $data);

        // Konversi gambar ke WebP jika ada file yang diupload
        if (isset($data['file_path']) && !empty($data['file_path'])) {
            $originalPath = $data['file_path'];
            $convertedPath = $this->convertToWebP($data['file_path']);

            // Debug: Log hasil konversi
            logger()->info("Konversi: {$originalPath} -> {$convertedPath}");

            $data['file_path'] = $convertedPath;
        }

        // Debug: Log data setelah konversi
        logger()->info('Data setelah konversi:', $data);

        return $data;
    }


    private function convertToWebP(string $filePath): string
    {
        // Log input
        logger()->info("convertToWebP called with: {$filePath}");

        // Skip jika sudah berupa URL atau sudah WebP
        if (filter_var($filePath, FILTER_VALIDATE_URL)) {
            logger()->info("Skipping URL: {$filePath}");
            return $filePath;
        }

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        if ($extension === 'webp') {
            logger()->info("Already WebP: {$filePath}");
            return $filePath;
        }

        try {
            // Cek apakah file exists
            if (!Storage::disk('public')->exists($filePath)) {
                logger()->error("File not found: {$filePath}");
                return $filePath;
            }

            // Path file asli
            $originalPath = storage_path('app/public/' . $filePath);
            logger()->info("Original path: {$originalPath}");

            // Generate nama file WebP
            $pathInfo = pathinfo($filePath);
            $filename = $pathInfo['filename'];
            $directory = $pathInfo['dirname'];
            $webpPath = ($directory !== '.' ? $directory . '/' : '') . $filename . '.webp';

            logger()->info("Target WebP path: {$webpPath}");

            // Pastikan direktori ada
            $webpDirectory = dirname(storage_path('app/public/' . $webpPath));
            if (!is_dir($webpDirectory)) {
                mkdir($webpDirectory, 0755, true);
                logger()->info("Created directory: {$webpDirectory}");
            }

            // Konversi gambar ke WebP
            $manager = new ImageManager(new Driver());
            $image = $manager->read($originalPath);

            // Resize jika gambar terlalu besar (opsional)
            $image = $image->scaleDown(1920, 1080);

            // Konversi ke WebP dengan kualitas 85%
            $webpImage = $image->toWebp(85);

            // Simpan file WebP
            Storage::disk('public')->put($webpPath, (string) $webpImage);
            logger()->info("WebP file saved: {$webpPath}");

            // Hapus file asli setelah konversi berhasil
            if (Storage::disk('public')->exists($webpPath)) {
                Storage::disk('public')->delete($filePath);
                logger()->info("Original file deleted: {$filePath}");
            }

            logger()->info("Conversion successful: {$filePath} -> {$webpPath}");
            return $webpPath;
        } catch (\Exception $e) {
            logger()->error("Failed to convert image to WebP: " . $e->getMessage(), [
                'file_path' => $filePath,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $filePath; // Return file asli jika gagal
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    /**
     * Hook setelah record dibuat (backup method)
     */
    protected function afterSave(): void
    {
        $record = $this->getRecord();

        if ($record && $record->file_path) {
            $originalPath = $record->file_path;
            $extension = strtolower(pathinfo($originalPath, PATHINFO_EXTENSION));

            // Jika masih bukan WebP, konversi sekarang
            if ($extension !== 'webp' && !filter_var($originalPath, FILTER_VALIDATE_URL)) {
                logger()->info("afterSave: Converting {$originalPath} to WebP");

                $webpPath = $this->convertToWebP($originalPath);

                if ($webpPath !== $originalPath) {
                    // Update database dengan path WebP
                    $record->update(['file_path' => $webpPath]);
                    logger()->info("afterSave: Database updated with WebP path: {$webpPath}");
                }
            }
        }
    }
}
