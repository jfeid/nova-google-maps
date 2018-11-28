<?php

namespace Jfeid\NovaGoogleMaps;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class NovaGoogleMaps extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-google-maps';


    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->latitude(config('nova-google-maps.default_latitude'))
            ->longitude(config('nova-google-maps.default_longitude'))
            ->zoom(config('nova-google-maps.default_zoom'));
    }


    public function latitude($latitude)
    {
        return $this->withMeta(['latitude' => $latitude]);
    }


    public function longitude($longitude)
    {
        return $this->withMeta(['longitude' => $longitude]);
    }


    public function zoom($zoom)
    {
        return $this->withMeta(['zoom' => intval($zoom)]);
    }


    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        $model->setAttribute($attribute, [
            'latitude'  => array_get($request, $attribute.'.latitude'),
            'longitude' => array_get($request, $attribute.'.longitude'),
        ]);
    }
}
