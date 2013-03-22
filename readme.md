# Jídelní lístek - ukázková komponenta

Ukázková komponenta pro MODX Revolution ku příložitosti konání Czech MODX Day v Praze.

Účelem je prezentace možností a problematiky vytváření vlastních komponent v MODX Revolution. Celá komponenta se má finálně sestávat z administrační čísti tzv. CMP (Custom Manager Pages), kde je možno spravovat kategorie jídel (Hotovky, Minutky, ...) a vlastní jídla nabídce. Webová část obsahuje snippet pro výpis jídelního lístku za využití snippetů, které umožňují vlastní volbu struktury HTML.

## Vývojářská instalace ##
Postup je obdobný jako pro [Developing an Extra in MODX Revolution, Part II](http://rtfm.modx.com/display/revolution20/Developing+an+Extra+in+MODX+Revolution%2C+Part+II)

- klon repozitáře (ideálně mimo MODX root, v našem případě do složky **/packages/**)
- nastavení konfiguračních souborů komponenty (**config.core.php**, **_build/config.core.php**)

### Manager ###
- vytvoření **Jmeného prostoru**
    - Jméno: *foodmenu*
    - Cesta ke Core: *{core_path}../../packages/foodmenu/core/components/foodmenu/*
    - Cesta k Assets: */packages/foodmenu/assets/components/foodmenu/*

- založení **Akce**
    - Kontroler: *index*
    - Jmenný prostor: *foodmenu*
    - Nadřazený kontroler: *Žádná akce*

- vytvoření **Horního menu**
    - Klíč slovníku: *foodmenu*
    - Popis: *foodmenu.menu_desc*
    - Akce: *foodmenu - index*

- vytvoření položek v **Konfiguraci systému**
    - **foodmenu.assets_url** s hodnoutou např. */packages/foodmenu/assets/components/foodmenu/*
    - **foodmenu.core_path** s hodnotou např. *{core_path}../../packages/foodmenu/core/components/foodmenu/*


## Licence ##

Vydáno pod [MIT licence](http://www.opensource.org/licenses/mit-license.php).

----------

# Food Menu - example component

## Development instalation ##
- similar to [Developing an Extra in MODX Revolution, Part II](http://rtfm.modx.com/display/revolution20/Developing+an+Extra+in+MODX+Revolution%2C+Part+II)

## License ##

Released under the [MIT license](http://www.opensource.org/licenses/mit-license.php).
