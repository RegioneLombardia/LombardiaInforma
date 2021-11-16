<?php

/**
 * Message translations for \kartik\password\StrengthValidator.
 *
 * It contains the localizable messages extracted from source code.
 * You may modify this file by translating the extracted messages.
 *
 * Each array element represents the translation (value) of a message (key).
 * If the value is empty, the message is considered as not translated.
 * Messages that no longer need translation will have their translations
 * enclosed between a pair of '@@' marks.
 *
 * Message string can be used with plural forms format. Check i18n section
 * of the guide for details.
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
return [
    '{attribute} should contain at least {n, plural, one{one character} other{# characters}} ({found} found)!' => '{attribute} dovrebbe contenere almeno {n, plural, one{un carattere} other{# caratteri}} ({found} trovati)!',
    '{attribute} should contain at most {n, plural, one{one character} other{# characters}} ({found} found)!' => '{attribute} dovrebbe contenere al massimo {n, plural, one{un carattere} other{# caratteri}} ({found} trovati)!',
    '{attribute} should contain exactly {n, plural, one{one character} other{# characters}} ({found} found)!' => '{attribute} dovrebbe contenere esattamente {n, plural, one{un carattere} other{# caratteri}} ({found} trovati)!',
    '{attribute} cannot contain any spaces' => "{attribute} non può contenere spazi",
    '{attribute} cannot contain the username' => "{attribute} non può contenere il nome utente",
    '{attribute} cannot contain an email address' => "{attribute} non può contenere un indirizzo email",
    '{attribute} must be a string' => '{attribute} deve essere una stringa',
    '{attribute} should contain at least {n, plural, one{one lower case character} other{# lower case characters}} ({found} found)!' =>
        '{attribute} deve contenere almeno {n, plural, one{un carattere minuscolo} other{# caratteri minuscoli}} ({found} trovati)!',
    '{attribute} should contain at least {n, plural, one{one upper case character} other{# upper case characters}} ({found} found)!' =>
        '{attribute} deve contenere almeno {n, plural, one{un carattere maiuscolo} other{# caratteri maiuscoli}} ({found} trovati)!',
    '{attribute} should contain at least {n, plural, one{one numeric / digit character} other{# numeric / digit characters}} ({found} found)!' =>
        '{attribute} deve contenere almeno {n, plural, one{un carattere numerico / cifre} other{# caratteri numerico / cifre}} ({found} trovati)!',
    '{attribute} should contain at least {n, plural, one{one special character} other{# special characters}} ({found} found)!' =>
        '{attribute} deve contenere almeno {n, plural, one{un carattere speciale} other{# caratteri speciale}} ({found} trovati)!',
];
