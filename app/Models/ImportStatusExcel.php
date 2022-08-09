<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStatusExcel extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'import_status_excels';
    protected $casts = [
        'commentarii' => 'array'
    ];

    CONST STATUS_IMPORT_SUCCESS = 1;
    CONST STATUS_IMPORT_FAILED = 2;

    public static function getImportStatus() {
        return [
          self::STATUS_IMPORT_SUCCESS => 'Данные успешно загружены',
          self::STATUS_IMPORT_FAILED => 'Загрузка данных не произошла'
        ];
    }

    CONST TYPE_CLIENT = 1;
    CONST TYPE_CULTURE = 2;
    CONST TYPE_FERTILIZER = 3;
    CONST TYPE_USER = 4;

    public static function getTypeImport() {
        return [
          self::TYPE_CLIENT => 'Клиенты',
          self::TYPE_CULTURE => 'Культуры',
          self::TYPE_FERTILIZER => 'Удобрения',
          self::TYPE_USER => 'Пользователи'
        ];
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
