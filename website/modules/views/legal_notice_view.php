<?php
/**
 * legal_notice.php
 *
 * page de mentions légales du site web
 *
 * Affiche les informations obligatoires :
 * hébergeur, données personnelles, cookies etc
 *
 * &author Kawthar CHAIB EDDOUR
 */

namespace modules\views;

class legal_notice_view {
    /**
     * Afficher la page des mentions légales
     *
     * @return void
     */
    public function show(): void {
        template_view::html_begin(
            'Mentions légales - Cyber Cigales',
            'Mentions légales du site Cyber Cigales',
            ['reset.css','fonts.css', 'header.css', 'footer.css', 'legal_notice.css']
        );
        template_view::page_header();
        echo <<< HTML
        <main class="legal">
        <h1 class="title">Mentions légales</h1>
        <section class="conception">
            <h2>Conception et réalisation du site</h2>
            <ul>
                <li>
                    <strong>Pilotage et direction de projet</strong> : MARTIN NEVOT Mickael - 
                    Enseignant / formateur en informatique et en conception de jeux vidéo - IUT d'Aix-Marseille - Aix Marseille Université
                
                </li>
                <li>
                    Conception graphique et UI/UX Design : BARTAL Manal, CHAIB EDDOUR Kawthar, GOUIN Gabriel, MANKAI Adam, SBEGHEN Alexandre
                </li>
                <li>
                    Développement technique et intégration : BARTAL Manal, CHAIB EDDOUR Kawthar, GOUIN Gabriel, MANKAI Adam, SBEGHEN Alexandre 
                </li>
            </ul>
            
            <p>Courriel : cyber-cigales@alwaysdata.net</p>
            
        </section>
        <section class="herbergeur">
            <h2>Hébergeur</h2>
            <p>AlwaysData</p>
        </section>
        <section class="legal_notice_contenu">
            <h2>Contenu éditorial et mise à jour</h2>
            <p> Cyber Cigales est un projet pédagogique : un escape game
                numérique destiné aux lycéens afin de les sensibiliser à la 
                protection de leurs données. Les informations mises à disposition 
                sur le site ont une valeur indicative et pédagogique</p>
        </section>
        <section class="auteurs">
            <h2>Auteurs</h2>
            <p>Ce site a été conçu et développé par : <strong>BARTAL</strong> Manal, <strong>CHAIB EDDOUR</strong> Kawthar, <strong>GOUIN</strong> Gabriel, <strong>MANKAI</strong> Adam, <strong>SBEGHEN</strong> Alexandre
            dans le cadre d'un projet pédagogique, en deuxième année de BUT informatique.
            </p>
            <p>Contact : <a class="legal_link" href="mailto:cyber-cigales@alwaysdata.net">cybercigales@alwaysdata.net</a></p>
        </section> 
        </main>
HTML;
        template_view::page_footer();
        template_view::html_end();
    }
}
