<?php 
// Helper untuk menangani upload dan resize gambar
namespace App\Helpers; 
 
class ImageHelper 
{ 
    /**
     * Upload dan resize gambar
     * 
     * @param  \Illuminate\Http\UploadedFile  $file      File gambar yang diupload
     * @param  string  $directory                        Direktori tujuan penyimpanan
     * @param  string  $fileName                         Nama file yang akan disimpan
     * @param  int|null  $width                          Lebar gambar baru (opsional)
     * @param  int|null  $height                         Tinggi gambar baru (opsional)
     * @return string                                    Nama file yang disimpan
     */
    public static function uploadAndResize($file, $directory, $fileName, $width = null, $height = null) 
    { 
        // Tentukan path tujuan penyimpanan gambar
        $destinationPath = public_path($directory); 
        
        // Buat direktori jika belum ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        // Ambil ekstensi file dan ubah ke huruf kecil
        $extension = strtolower($file->getClientOriginalExtension()); 
        $image = null; 
 
        // Tentukan metode pembuatan gambar berdasarkan ekstensi file 
        switch ($extension) { 
            case 'jpeg': 
            case 'jpg': 
                // Membuat resource gambar dari file JPEG
                $image = imagecreatefromjpeg($file->getRealPath()); 
                break; 
            case 'png': 
                // Membuat resource gambar dari file PNG
                $image = imagecreatefrompng($file->getRealPath()); 
                break; 
            case 'gif': 
                // Membuat resource gambar dari file GIF
                $image = imagecreatefromgif($file->getRealPath()); 
                break; 
            default: 
                // Jika tipe file tidak didukung, lempar exception
                throw new \Exception('Unsupported image type'); 
        } 
 
        // Resize gambar jika lebar diset 
        if ($width) { 
            // Ambil ukuran asli gambar
            $oldWidth = imagesx($image); 
            $oldHeight = imagesy($image); 
            // Hitung rasio aspek gambar
            $aspectRatio = $oldWidth / $oldHeight; 
            if (!$height) { 
                // Jika tinggi tidak diisi, hitung otomatis agar rasio tetap
                $height = $width / $aspectRatio; // Hitung tinggi dengan mempertahankan aspek rasio 
            } 
            // Buat resource gambar baru dengan ukuran baru
            $newImage = imagecreatetruecolor($width, $height); 
            // Salin dan resize gambar ke resource baru
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight); 
            // Hapus resource gambar lama dari memori
            imagedestroy($image); 
            $image = $newImage; 
        } 
 
        // Simpan gambar dengan kualitas asli 
        switch ($extension) { 
            case 'jpeg': 
            case 'jpg': 
                // Simpan gambar JPEG dengan kualitas 90
                imagejpeg($image, $destinationPath . '/' . $fileName, 90); // Menambahkan kualitas 90
                break; 
            case 'png': 
                // Simpan gambar PNG dengan kompresi level 9
                imagepng($image, $destinationPath . '/' . $fileName, 9); // Menambahkan kompresi level 9
                break; 
            case 'gif': 
                // Simpan gambar GIF
                imagegif($image, $destinationPath . '/' . $fileName); 
                break; 
        } 
 
        // Hapus resource gambar dari memori
        imagedestroy($image); 
        // Kembalikan nama file yang disimpan
        return $fileName; 
    } 
}