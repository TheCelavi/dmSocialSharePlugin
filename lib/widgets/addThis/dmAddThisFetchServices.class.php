<?php

/**
 * Description of dmAddThisFetchServices
 *
 * @author TheCelavi
 */
class dmAddThisFetchServices {

    public static function fetchServices() {

        $webService = new dmWebBrowser(array());
        $webService->get('http://cache.addthiscdn.com/services/v1/sharing.en.xml');
        $doc = new DOMDocument();
        $doc->loadXML($webService->getResponseText());
        $items = $doc->getElementsByTagName('service');
        $result = array();
        $result['compact'] = 'More';
        foreach ($items as $item) {
            if ($item->childNodes->length) {
                $tmp = array();
                foreach ($item->childNodes as $i) {
                    $tmp[$i->nodeName] = $i->nodeValue;
                }
                $result[$tmp['code']] = $tmp['name'];
            }
        }
        return $result;
    }

}

?>
