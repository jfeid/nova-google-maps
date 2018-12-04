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

    /**
     * @var string
     */
    protected $latitude_attr;

    /**
     * @var string
     */
    protected $longitude_attr;


    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->setAttributes(
            $this->attribute . '_lat',
            $this->attribute . '_lng'
        );

        $this->setValue(
            config('nova-google-maps.default_latitude'),
            config('nova-google-maps.default_longitude')
        );

        $this->zoom(config('nova-google-maps.default_zoom'));
    }


    public function setAttributes(string $latitude, string $longitude)
    {
        $this->latitude_attr  = $latitude;
        $this->longitude_attr = $longitude;

        return $this->withMeta([
            'latitude_attr'  => $this->latitude_attr,
            'longitude_attr' => $this->longitude_attr,
        ]);
    }


    public function setValue($latitude, $longitude)
    {
        return $this->withMeta([
            'latitude'  => $latitude,
            'longitude' => $longitude
        ]);
    }


    public function zoom($zoom)
    {
        return $this->withMeta(['zoom' => intval($zoom)]);
    }


    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        $model->setAttribute($this->latitude_attr, $request->get($this->latitude_attr));
        $model->setAttribute($this->longitude_attr, $request->get($this->longitude_attr));
    }
}
