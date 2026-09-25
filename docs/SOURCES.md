# Sources utilisées dans le projet

## SAAD / IA / LLM

| Tâche | Outil | Prompt (résumé) | Solution proposée | Prise de décision |
|-|-|-|-|-|
| Configurer et intégrer Stylelint dans les CI/CD | Claude | *[...] ConfigurationError: No configuration provided [...]* | Fichier JSON de configuration : [lien](https://claude.ai/share/1661eb5f-c8f1-4b1a-8415-e33f1585e27c) | Utilisation & amélioration du fichier généré pour valider les CSS |
| Réécriture d'URL dans le `.htaccess` et choix de la page dans le routeur | Claude | *[...] j'utilise ce routeur [...] Et pour accéder aux pages on utilise les get. Or j'aimerais que l'on puisse le faire avec par exemple `/home` ou `/login`, etc tu sais comment on fait ?* | Oui, il faut deux choses : rediriger toutes les requêtes vers ton `index.php` avec un `.htaccess`, puis lire le chemin de l'URL au lieu de `$_GET['page']` : [lien](https://claude.ai/share/03b5b684-22e9-4e56-9bf1-5db00563d3ba) | Demande d'**explication en détail** du code fourni puis utilisation de ce qui est nécessaire |

## Divers

- [**SFTP Upload GitHub Action**](https://github.com/marketplace/actions/sftp-upload) : Utilisé pour mettre à jour le site web autmatiquement dans [*Build and deploy website*](https://github.com/Alexandre-SBEGHEN/BUT-R3.01-Projet-web/actions/workflows/build-and-deploy.yml)
- [**Website Buidler**](https://github.com/Alexandre-SBEGHEN/Website-Builder) : Permet le build d'un site web, notamment en automatisant les minifications de scripts