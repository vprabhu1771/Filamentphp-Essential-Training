```
php artisan make:model SystemSetting -m
```

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');

            $table->string('email')->nullable();

            $table->string('website')->nullable();

            $table->string('customer_care_no')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
```

`SystemSetting.php`

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'website',
        'customer_care_no'
    ];
}
```

`SystemSettingSeeder.php`
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SystemSetting;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::create([
            'company_name' => 'YOUR COMPANY NAME',
            'email' => 'YOUR COMPANY EMAIL',
            'website' => 'YOUR COMPANY WEBSITE',
            'customer_care_no' => 'YOUR COMPANY CUSTOMER CARE NO',
        ]);
    }
}
```

`EditSystemSetting.php`
```
<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms;

use Filament\Tables;
use Filament\Tables\Table;

use Filament\Support\Exceptions\Halt;

use App\Models\SystemSetting;

use Filament\Notifications\Notification;

class EditSystemSetting extends Page implements HasForms
{

    use InteractsWithForms;

    public ?array $data = [];

    public SystemSetting $systemSetting;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-system-setting';

    public function mount(): void 
    {
        // $this->form->fill();
        
        // Retrieve the first or default system setting data
        $this->systemSetting = SystemSetting::firstOrNew([]);

        // dd(SystemSetting::first());

        // dd($this->systemSetting->attributesToArray());
        
        // Prefill the form fields
        // $this->form->fill($this->systemSetting->toArray());

        // Map the model's attributes to the form state
        $this->data = $this->systemSetting->toArray();
    }
 
    public  function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('company_name')
                ->label('Company Name')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            Forms\Components\TextInput::make('website')
                ->label('Website')
                // ->url()
                ->required(),
            Forms\Components\TextInput::make('customer_care_no')
                ->label('Customer Care Number')
                ->required(),
        ])
        ->statePath('data');
    }


    protected function getFormActions(): array
    {
        return [
            Tables\Actions\Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            // $data = $this->form->getState();
 
            $this->systemSetting->fill($this->form->getState());
            $this->systemSetting->save();

            // $this->notify('success', 'System settings saved successfully!');

        } catch (Halt $exception) {
            return;
        }

        Notification::make() 
        ->success()
        ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        ->send(); 
    }
}
```

`edit-system-setting.blade.php`

```
<x-filament-panels::page>
    
    <x-filament-panels::form wire:submit="save"> 

        {{ $this->form }}

        <x-filament-panels::form.actions 
            :actions="$this->getFormActions()"
        />
    </x-filament-panels::form>

</x-filament-panels::page>
```