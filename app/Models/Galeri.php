<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'galeri';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'file_path',
        'deskripsi',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * User Relation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($galeri) {
            if ($galeri->file_path && !filter_var($galeri->file_path, FILTER_VALIDATE_URL)) {
                $galeri->file_path = static::convertImageToWebP($galeri->file_path);
            }
        });
    }

    private static function convertImageToWebP(string $filePath): string
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
            if (!Storage::disk('public')->exists($filePath)) {
                logger()->error("File not found: {$filePath}");
                return $filePath;
            }

            $originalPath = storage_path('app/public/' . $filePath);
            logger()->info("Original path: {$originalPath}");

            $pathInfo = pathinfo($filePath);
            $filename = $pathInfo['filename'];
            $directory = $pathInfo['dirname'];
            $webpPath = ($directory !== '.' ? $directory . '/' : '') . $filename . '.webp';

            logger()->info("Target WebP path: {$webpPath}");

            $webpDirectory = dirname(storage_path('app/public/' . $webpPath));
            if (!is_dir($webpDirectory)) {
                mkdir($webpDirectory, 0755, true);
                logger()->info("Created directory: {$webpDirectory}");
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($originalPath);

            $image = $image->scaleDown(1920, 1080);

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

            return $filePath;
        }
    }
}
