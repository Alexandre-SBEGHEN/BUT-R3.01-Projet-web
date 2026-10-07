<?php

namespace modules\views;

use modules\views\template_view;

class about_view {
    public function show(): void {
        template_view::html_begin(
            title: 'À propos - Cyber Cigales' ,
            description: ' Découvre le projet Cyber Cigales.' ,
            css_names: ['reset.css', 'fonts.css', 'header.css', 'footer.css', 'about.css']
        );
        template_view::page_header('about');
        echo <<< HTML
        <main class="about">
        <section class="about__intro">
            <h1> À propos de Cyber Cigales </h1>
            <p>
            Cyber Cigales est un projet réalisé dans le cadre 
            d'une Situation d'Apprentissage et d'Évaluation (SAE) 
            lors de notre deuxième année de BUT Informatique 
            à Aix-en-Provence.
            </p>
           
            <p> 
               La SAE consiste à concevoir un escape game numérique
               ludique pour initier principalement les lycéennes
               à la cybersécurité et à la cryptographie.
             </p>
            <p>
                Ce site web a été créé lors du projet web de la ressource R301. 
                Le projet est mutualisé avec celui de la situation d'apprentissage et d'évaluation (SAÉ).
                Ici l’attention doit être portée tout particulièrement sur la technique.
            </p>
        </section>
        <section class="about__equipe">
            <h2> L'équipe du projet </h2>
            <p>
                Ce projet a été réalisé en équipe dans le cadre de notre SAE.
            </p>
            <h3> Les membres de l'équipe </h3>
            <ul>
                <li> BARTAL Manal </li>
                <li> CHAIB EDDOUR Kawthar </li>
                <li> GOUIN Gabriel </li>
                <li> MANKAI Adam </li>
                <li> SBEGHEN Alexandre </li>
            </ul>
            <h3> Directeur du projet </h3>
            <p>
                <a href="https://www.mickael-martin-nevot.com/" target="_blank" rel="noopener noreferrer">MARTIN NEVOT Mickael</a> -  Enseignant / formateur en informatique et en conception de jeux vidéo - 
                IUT d'Aix-Marseille - Aix Marseille Université
            </p>
            <h3> Directeur de la SAE </h3>
            <p>
                ANNI Samuele - Maître de Conférence à Aix-Marseille Université IUT - I2M
            </p>
        </section>      
        </main>
HTML;
        template_view::page_footer();
        template_view::html_end();
    }
}



