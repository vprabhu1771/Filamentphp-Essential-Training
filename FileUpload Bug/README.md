```
php artisan vendor:publish --tag=livewire:config
```

https://www.answeroverflow.com/m/1200387549932294144

field must not be greater than 12288 kilobytes.

PHP Warning:  POST Content-Length of 102377127 bytes exceeds the limit of 41943040 bytes in Unknown on line 0

`example-app\config\livewire.php`

```php
'temporary_file_upload' => [
        'disk' => null,        // Example: 'local', 's3'              | Default: 'default'
        // 'rules' => null,       // Example: ['file', 'mimes:png,jpg']  | Default: ['required', 'file', 'max:12288'] (12MB)
        
        'rules' => 'file|mimes:mp3,mp4,png,jpg,jpeg,pdf', // Remove size limit

        'directory' => null,   // Example: 'tmp'                      | Default: 'livewire-tmp'
        'middleware' => null,  // Example: 'throttle:5,1'             | Default: 'throttle:60,1'
        'preview_mimes' => [   // Supported file types for temporary pre-signed file URLs...
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
        ],
        'max_upload_time' => 5, // Max duration (in minutes) before an upload is invalidated...
        'cleanup' => true, // Should cleanup temporary uploads older than 24 hrs...
    ],
```