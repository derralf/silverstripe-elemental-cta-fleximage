<?php

namespace Derralf\Elements\CtaFlexImage\Element;


use DNADesign\Elemental\Models\BaseElement;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Assets\Image;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\DropdownField;

class ElementCtaFlexImage extends BaseElement
{
    public function getType()
    {
        return self::$singular_name;
    }

    private static $icon = 'ctafleximage-icon'; // 'font-icon-link';

    private static $table_name = 'ElementCtaFlexImage';

    private static $singular_name = 'CTA-Element mit Flex-Bild';
    private static $plural_name = 'CTA-Elemente mit Flex-Bild';
    private static $description = '';

    private static $db = [
        'HTML'                    => 'HTMLText',
        'Color'                   => 'Varchar(255)',
        'ImagePositionHorizontal' => "Enum('left,center,right','center')",
        'ImagePositionVertical'   => "Enum('top,center,bottom','center')",
    ];

    private static $has_one = [
        'Image' => Image::class,
        'ReadMoreLink' => Link::Class

    ];

    private static $has_many = [
    ];

    private static $many_many = [];

    private static $belongs_many_many = [];

    private static $owns = [
        'Image'
    ];

    private static $defaults = [
        'ImagePositionHorizontal' => 'center',
        'ImagePositionVertical'   => 'center'
    ];

    private static $colors = [];


    private static $field_labels = [
        'Title' => 'Titel',
        'Sort' 	=>	'Sortierung'
    ];

    public function updateFieldLabels(&$labels)
    {
        parent::updateFieldLabels($labels);
        $labels['HTML'] = _t(__CLASS__ . '.ContentLabel', 'Inhalt');
        $labels['Image'] = _t(__CLASS__ . '.ImageLabel', 'Bild');

        $labels['ImagePositionHorizontal'] = _t(__CLASS__ . '.ImageLabel', 'Bildausrichtung horizontal');
        $labels['ImagePositionVertical'] = _t(__CLASS__ . '.ImageLabel', 'Bildausrichtung vertikal');

    }

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {

            // Style: Description for default style (describes Layout thats used, when no special style is selected)
            $Style = $fields->dataFieldByName('Style');
            $StyleDefaultDescription = $this->owner->config()->get('styles_default_description', Config::UNINHERITED);
            if ($Style && $StyleDefaultDescription) {
                $Style->setDescription($StyleDefaultDescription);
            }

            // ReadMoreLink: use Linkfield
            $ReadMoreLink = LinkField::create('ReadMoreLinkID', 'Link');
            $fields->replaceField('ReadMoreLinkID', $ReadMoreLink);


            // Image
            $Image = $fields->dataFieldByName('Image');
            $Image -> setFolderName('content-cta-images');


            $colors = $this->config()->get('colors');

            if ($colors && count($colors) > 0) {
                $colorDropdown = DropdownField::create('Color', _t(__CLASS__.'.COLOR', 'Color variation'), $colors);

                $fields->insertBefore($colorDropdown, 'HTML');

                $colorDropdown->setEmptyString(_t(__CLASS__.'.CUSTOM_COLORS', 'Select a color...'));
            } else {
                $fields->removeByName('Color');
            }



        });
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function ImageBgPosition() {
        $h = $this->ImagePositionHorizontal;
        $v = $this->ImagePositionVertical;
        $pos = $h . " " . $v;
        return "background-position:{$pos};";
    }

    public function ReadmoreLinkClass() {
        return $this->config()->get('readmore_link_class');
    }




}
