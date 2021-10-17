<?php
namespace Dutra\BrazilCheckout\Plugin\Checkout\Block\Checkout\AttributeMerger;

use Magento\Checkout\Block\Checkout\AttributeMerger;

class Plugin
{
    public function afterMerge(AttributeMerger $subject, $result)
    {
        if (array_key_exists('street', $result)) {
            $result['street']['children'][0]['label'] = __('Street');
            $result['street']['children'][0]['additionalClasses'] = false;
            $result['street']['children'][0]['required'] = true;
            $result['street']['children'][0]['validation']['required-entry'] = true;

            $result['street']['children'][1]['label'] = __('Number');
            $result['street']['children'][1]['additionalClasses'] = 'required';
            $result['street']['children'][1]['validation']['required-entry'] = true;
            $result['street']['children'][1]['validation']['validate-number'] = true;

            $result['street']['children'][2]['label'] = __('Complement');
            $result['street']['children'][2]['additionalClasses'] = false;
            $result['street']['children'][2]['validation']['max_text_length'] = 10;


            $result['street']['children'][3]['label'] = __('Neighborhood');
            $result['street']['children'][3]['additionalClasses'] = 'required';
            $result['street']['children'][3]['required'] = true;
            $result['street']['children'][3]['validation']['required-entry'] = true;
        }

        $result['telephone']['validation']['min_text_length'] = 14;

        // $result['company']['visible'] = false;

        $result['firstname']['sortOrder'] = 10;
        $result['lastname']['sortOrder'] = 20;
        $result['postcode']['sortOrder'] = 40;
        $result['street']['sortOrder'] = 50;
        $result['city']['sortOrder'] = 60;
        $result['region_id']['sortOrder'] = 70;
        $result['telephone']['sortOrder'] = 80;
        $result['country_id']['sortOrder'] = 90;

        return $result;
    }
}
