<?php

namespace lodesnaet\crafticonpicker\models;

use Craft;
use craft\base\Model;

/**
 * IconPicker settings
 */
class Settings extends Model
{
    public ?string $fontAwesomeKitUrl = null;

    public function rules(): array
    {
        return [
            ['fontAwesomeKitUrl', 'string'],
            ['fontAwesomeKitUrl', 'url'],
            ['fontAwesomeKitUrl', 'default', 'value' => ''],
        ];
    }
}