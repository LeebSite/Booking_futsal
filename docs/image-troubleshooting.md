# Image Display Troubleshooting Guide

## Masalah: Gambar Tidak Dapat Terlihat Setelah Upload

### 🔍 **Diagnosis Masalah**

Masalah gambar yang tidak dapat terlihat biasanya disebabkan oleh:

1. **Symbolic Link Belum Dibuat**
2. **Konfigurasi APP_URL Salah**
3. **FILESYSTEM_DISK Tidak Sesuai**
4. **Permission File/Folder**
5. **Path URL Tidak Benar**

### ✅ **Solusi yang Telah Diterapkan**

#### **1. Symbolic Link Storage**
```bash
php artisan storage:link
```
**Status**: ✅ **FIXED** - Link sudah dibuat dari `public/storage` ke `storage/app/public`

#### **2. Konfigurasi .env**
```env
# BEFORE
APP_URL=http://localhost
FILESYSTEM_DISK=local

# AFTER  
APP_URL=http://127.0.0.1:8000
FILESYSTEM_DISK=public
```
**Status**: ✅ **FIXED** - URL dan disk sudah disesuaikan

#### **3. Clear Cache**
```bash
php artisan config:clear
php artisan cache:clear
```
**Status**: ✅ **FIXED** - Cache sudah dibersihkan

### 🛠️ **Komponen Baru untuk Menangani Gambar**

#### **1. Safe Image Component**
Komponen `<x-safe-image>` dengan multiple fallback:

```blade
<x-safe-image 
    :src="$item->foto"
    :alt="$item->nama_lapangan"
    class="w-8 h-8 object-cover rounded shadow-sm"
    :showLink="true" />
```

**Features:**
- **Primary**: Menggunakan `Storage::url()`
- **Fallback 1**: Menggunakan `asset('storage/')`
- **Fallback 2**: Menampilkan icon jika gambar tidak ada
- **Error Handling**: JavaScript untuk handle error loading

#### **2. Helper Function**
Helper `image_url()` di AppServiceProvider:

```php
function image_url($path) {
    if (!$path) return null;
    
    $storageUrl = \Storage::url($path);
    
    if (!\Storage::disk('public')->exists($path)) {
        return asset('storage/' . $path);
    }
    
    return $storageUrl;
}
```

#### **3. Blade Directive**
```blade
@imageUrl($item->foto)
```

### 🔧 **Troubleshooting Steps**

#### **Step 1: Verifikasi Symbolic Link**
```bash
# Check if symlink exists
ls -la public/storage

# Recreate if needed
php artisan storage:link
```

#### **Step 2: Check File Permissions**
```bash
# Set proper permissions
chmod -R 755 storage/
chmod -R 755 public/storage/
```

#### **Step 3: Verify File Exists**
```bash
# Check if file exists in storage
ls -la storage/app/public/lapangan/

# Check if file exists in public
ls -la public/storage/lapangan/
```

#### **Step 4: Test URL Access**
Buka browser dan akses langsung:
- `http://127.0.0.1:8000/storage/lapangan/filename.jpg`
- `http://127.0.0.1:8000/debug/images` (untuk debug page)

#### **Step 5: Check Configuration**
```php
// In tinker or debug page
config('app.url')                    // Should be http://127.0.0.1:8000
config('filesystems.default')       // Should be 'public'
config('filesystems.disks.public.url') // Should be http://127.0.0.1:8000/storage
```

### 🚨 **Common Issues & Solutions**

#### **Issue 1: 404 Not Found pada gambar**
**Cause**: Symbolic link belum dibuat
**Solution**: 
```bash
php artisan storage:link
```

#### **Issue 2: Gambar tidak update setelah upload**
**Cause**: Cache browser atau server
**Solution**:
```bash
php artisan cache:clear
# + Hard refresh browser (Ctrl+F5)
```

#### **Issue 3: Permission Denied**
**Cause**: File permission tidak tepat
**Solution**:
```bash
chmod -R 755 storage/
chown -R www-data:www-data storage/ # Linux/Mac
```

#### **Issue 4: Wrong URL Path**
**Cause**: APP_URL tidak sesuai dengan server
**Solution**: Update `.env`
```env
APP_URL=http://127.0.0.1:8000  # Sesuaikan dengan port server
```

### 📊 **Debug Tools**

#### **1. Debug Page**
Akses: `http://127.0.0.1:8000/debug/images`

Menampilkan:
- Configuration info
- File existence check
- URL testing
- Directory contents

#### **2. Browser Console**
```javascript
// Check image load events
document.querySelectorAll('img').forEach(img => {
    console.log('Image src:', img.src);
    console.log('Natural size:', img.naturalWidth + 'x' + img.naturalHeight);
});
```

#### **3. Laravel Log**
```bash
tail -f storage/logs/laravel.log
```

### 🎯 **Best Practices**

#### **1. File Upload**
```php
// Always use public disk
$path = $request->file('foto')->store('lapangan', 'public');

// Store relative path in database
$model->foto = $path; // e.g., 'lapangan/filename.jpg'
```

#### **2. Display Images**
```blade
<!-- Use safe-image component -->
<x-safe-image :src="$item->foto" alt="Description" />

<!-- Or use Storage::url() with fallback -->
<img src="{{ Storage::url($item->foto) }}" 
     onerror="this.src='{{ asset('storage/' . $item->foto) }}'">
```

#### **3. Validation**
```php
$request->validate([
    'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
]);
```

### 📁 **File Structure**
```
project/
├── storage/app/public/          # File storage
│   ├── lapangan/               # Lapangan images
│   └── bukti_pembayaran/       # Payment proofs
├── public/storage/             # Symbolic link
└── resources/views/components/
    ├── safe-image.blade.php    # Safe image component
    └── image-display.blade.php # Advanced image component
```

### 🔄 **Migration Checklist**

- [x] Create symbolic link (`php artisan storage:link`)
- [x] Update APP_URL in .env
- [x] Set FILESYSTEM_DISK to 'public'
- [x] Clear configuration cache
- [x] Create safe-image component
- [x] Update all image displays to use new component
- [x] Add error handling and fallbacks
- [x] Create debug tools
- [x] Test image upload and display

### 🎉 **Result**

Setelah implementasi solusi ini:
- ✅ Gambar dapat ditampilkan dengan benar
- ✅ Multiple fallback untuk reliability
- ✅ Error handling yang proper
- ✅ Debug tools untuk troubleshooting
- ✅ Consistent image display across all pages

### 📞 **Support**

Jika masih ada masalah:
1. Akses debug page: `/debug/images`
2. Check browser console untuk error
3. Verify file permissions
4. Check Laravel logs
5. Restart server setelah perubahan konfigurasi
