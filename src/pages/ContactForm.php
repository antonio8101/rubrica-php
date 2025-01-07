<?php

namespace Abruno\Rubrica\pages;

class ContactForm implements ActionContract{

    public function respond(): string{

        $test = "prova";

        $format = <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>

            IL VALORE di TEST è : %d

                <!--un form che ci serve ad invocare la route / con il metodo POST-->
                <form action="/" method="post">
                    <input type="text" name="prova" id="prova">
                    <button type="submit">submit</button>
                </form>
            </body>
            </html>
        HTML;

        return sprintf($format, $test);

    }

}