<?php

namespace App\Models\Backend\AdditionalFeatureManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'site_title',
        'site_meta_description',
        'favicon',
        'logo',
        'banner',
        'default_seo_code_on_header',
        'default_seo_code_on_footer',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'site_settings';

    public static function saveOrUpdateSiteSetting($request, $id = null)
    {
        SiteSetting::updateOrCreate(['id' => $id], [
            'site_title'                 => $request->site_title,
            'site_meta_description'            => $request->site_meta_description,
            'default_seo_code_on_header'       => $request->default_seo_code_on_header,
            'default_seo_code_on_footer'       => $request->default_seo_code_on_footer,
            'favicon'                 => imageUpload($request->file('favicon'), 'additional-features-management/site-settings/', 'favicon', '16', '16', (isset($id) ? static::find($id)->favicon : null)),
            'logo'                 => imageUpload($request->file('logo'), 'additional-features-management/site-settings/', 'logo', '170', '75', (isset($id) ? static::find($id)->logo : null)),
            'banner'                 => imageUpload($request->file('banner'), 'additional-features-management/site-settings/', 'banner', '700', '400', (isset($id) ? static::find($id)->banner : null)),
            'status'                => 1
        ]);
    }
}
