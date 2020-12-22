<?php

namespace Modules\Isite\View\Components\Whatsapp;

use Illuminate\View\Component;

class Whatsapp extends Component
{


    public $items;
    public $view;
    public $itemLayout;
    public $layout;
    public $title;
    public $mask;
    public $icon;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($layout = 'whatsapp-layout-1', $title = '', $id = 'whatsappComponent', $mask= 1, $icon = 'fa fa-whatsapp')
    {
        $this->layout = $layout ?? 'whatsapp-layout-1';
        $this->view = "isite::frontend.components.whatsapp.layouts.{$this->layout}.index";
        $this->title = $title ?? '';
        $this->id = $id ?? 'whatsappComponent';
        $this->icon = $icon ?? 'fa fa-whatsapp';
        $this->mask = $mask ?? 1;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $items = [];
        for($i=1;$i<=3;$i++) {
            $item = json_decode(setting('isite::whatsapp'.$i));
            if(!empty($item->callingCode) && !empty($item->number)){
                $item->formattedNumber =  "+{$item->callingCode} ".$this->formatNumber($item->number, $this->mask);
                $items[] = $item;
            }
        }

        $this->items = $items;

        return view($this->view);
    }

    private function formatNumber ( $mynum, $mask ) {
        /*********************************************************************/
        /*   Purpose: Return either masked phone number or false             */
        /*     Masks: Val=1 or xxx xxx xxxx                                             */
        /*            Val=2 or xxx xxx.xxxx                                             */
        /*            Val=3 or xxx.xxx.xxxx                                             */
        /*            Val=4 or (xxx) xxx xxxx                                           */
        /*            Val=5 or (xxx) xxx.xxxx                                           */
        /*            Val=6 or (xxx).xxx.xxxx                                           */
        /*            Val=7 or (xxx) xxx-xxxx                                           */
        /*            Val=8 or (xxx)-xxx-xxxx                                           */
        /*********************************************************************/
        $val_num        = $this->validatePhoneNumber( $mynum );
        if ( !$val_num && !is_string ( $mynum ) ) {
            echo "Number $mynum is not a valid phone number! \n";
            return false;
        }   // end if !$val_num
        if ( ( $mask == 1 ) || ( $mask == 'xxx xxx xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '$1 $2 $3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 1
        if ( ( $mask == 2 ) || ( $mask == 'xxx xxx.xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '$1 $2.$3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 2
        if ( ( $mask == 3 ) || ( $mask == 'xxx.xxx.xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '$1.$2.$3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 3
        if ( ( $mask == 4 ) || ( $mask == '(xxx) xxx xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '($1) $2 $3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 4
        if ( ( $mask == 5 ) || ( $mask == '(xxx) xxx.xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '($1) $2.$3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 5
        if ( ( $mask == 6 ) || ( $mask == '(xxx).xxx.xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '($1).$2.$3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 6
        if ( ( $mask == 7 ) || ( $mask == '(xxx) xxx-xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '($1) $2-$3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 7
        if ( ( $mask == 8 ) || ( $mask == '(xxx)-xxx-xxxx' ) ) {
            $phone = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~',
                '($1)-$2-$3'." \n", $mynum);
            return $phone;
        }   // end if $mask == 8
        return false;       // Returns false if no conditions meet or input
    }

    private function validatePhoneNumber ( $phone ) {
        /*********************************************************************/
        /*   Purpose:   To determine if the passed string is a valid phone  */
        /*              number following one of the establish formatting        */
        /*                  styles for phone numbers.  This function also breaks    */
        /*                  a valid number into it's respective components of:      */
        /*                          3-digit area code,                                      */
        /*                          3-digit exchange code,                                  */
        /*                          4-digit subscriber number                               */
        /*                  and validates the number against 10 digit US NANPA  */
        /*                  guidelines.                                                         */
        /*********************************************************************/
        $format_pattern =   '/^(?:(?:\((?=\d{3}\)))?(\d{3})(?:(?<=\(\d{3})\))'.
            '?[\s.\/-]?)?(\d{3})[\s\.\/-]?(\d{4})\s?(?:(?:(?:'.
            '(?:e|x|ex|ext)\.?\:?|extension\:?)\s?)(?=\d+)'.
            '(\d+))?$/';
        $nanpa_pattern      =   '/^(?:1)?(?(?!(37|96))[2-9][0-8][0-9](?<!(11)))?'.
            '[2-9][0-9]{2}(?<!(11))[0-9]{4}(?<!(555(01([0-9]'.
            '[0-9])|1212)))$/';

        // Init array of variables to false
        $valid = array('format' =>  false,
            'nanpa' => false,
            'ext'       => false,
            'all'       => false);

        //Check data against the format analyzer
        if ( preg_match ( $format_pattern, $phone, $matchset ) ) {
            $valid['format'] = true;
        }

        //If formatted properly, continue
        //if($valid['format']) {
        if ( !$valid['format'] ) {
            return false;
        } else {
            //Set array of new components
            $components =   array ( 'ac' => $matchset[1], //area code
                'xc' => $matchset[2], //exchange code
                'sn' => $matchset[3] //subscriber number
            );
            //              $components =   array ( 'ac' => $matchset[1], //area code
            //                                              'xc' => $matchset[2], //exchange code
            //                                              'sn' => $matchset[3], //subscriber number
            //                                              'xn' => $matchset[4] //extension number
            //                                              );

            //Set array of number variants
            $numbers    =   array ( 'original' => $matchset[0],
                'stripped' => substr(preg_replace('[\D]', '', $matchset[0]), 0, 10)
            );

            //Now let's check the first ten digits against NANPA standards
            if(preg_match($nanpa_pattern, $numbers['stripped'])) {
                $valid['nanpa'] = true;
            }

            //If the NANPA guidelines have been met, continue
            if ( $valid['nanpa'] ) {
                if ( !empty ( $components['xn'] ) ) {
                    if ( preg_match ( '/^[\d]{1,6}$/', $components['xn'] ) ) {
                        $valid['ext'] = true;
                    }   // end if if preg_match
                } else {
                    $valid['ext'] = true;
                }   // end if if  !empty
            }   // end if $valid nanpa

            //If the extension number is valid or non-existent, continue
            if ( $valid['ext'] ) {
                $valid['all'] = true;
            }   // end if $valid ext
        }   // end if $valid
        return $valid['all'];
    }   // end functon validate_phone_number
}
