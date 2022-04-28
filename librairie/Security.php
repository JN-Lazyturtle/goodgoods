<?php
class Security {
    private static $seed = 'WAGANalDrH';

    public static function hacher($texte_en_clair) {
        $texte_a_hacher = self::$seed.$texte_en_clair;
        $texte_hache = hash('sha256', $texte_en_clair);
        return $texte_hache;
    }
}
