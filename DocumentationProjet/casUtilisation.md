# **Cas d’utilisation :**

**Acteur :** l’utilisateur

## **1.	UC01 - S’AUTHENTIFIER :**
**Description :** l’utilisateur doit s’authentifier pour accéder à son compte personnel et utiliser les fonctionnalités de l’application

**Scénarios :**  
a.	L’utilisateur peut s’authentifier depuis l’écran d’accueil de l’app  
b.	L’utilisateur peut saisir son identifiant et son mot de passe  
c.	L’utilisateur peut appuyer sur le bouton de connexion pour valider les informations  
d.	L’application vérifie les informations et autorise l’accès si les informations sont correctes  
e.	Si les informations sont incorrectes, l’application affiche un message d’erreur  


## **2.	UC02 - GÉRER SON PROFIL :**
**Description :** l’utilisateur peut gérer son profil en fournissant des infos personnelles pour personnaliser son expérience avec l’app

**Lien :** include – UC01 – S’authentifier

**Scénarios :**   
a.	L’utilisateur peut créer un profil en saisissant des infos comme son nom, prénom, date de naissance, sexe, e-mail et ville  
b.	L’utilisateur peut consulter son profil pour vérifier les infos personnelles enregistrées  


## **3.	UC03 - GÉRER LE CALENDRIER :**
**Description :** l’utilisateur peut gérer les rendez-vous dentaires en les ajoutant, en les supprimant et en consultant son calendrier 

**Lien :** include – UC01 – S’authentifier

**Scénarios :**   
a.	L’utilisateur peut ajouter un rdv dentaire à son calendrier en fournissant la date, l’heure et le lieu du rendez-vous  
b.	L’utilisateur peut supprimer un rendez-vous de son calendrier  
c.	L’utilisateur peut consulter son calendrier de rdv   


## **4.	UC04 - GÉRER LE JOURNAL DE BORD :**
**Description :** l’utilisateur peut utiliser le journal de bord pour enregistrer ses habitudes d’hygiène dentaire, suivre l’évolution de son brossage, fixer des objectifs et recevoir des conseils 

**Liens :**    
      include – UC01 - S’authentifier   
      extend – UC05 - Enregistrer les habitudes d’hygiène dentaire   
      extend – UC06 - Suivre l’évolution du brossage  
      extend – UC07 - Recevoir des conseils   
      
**Scénarios :**   
a.	L’utilisateur peut accéder au journal de bord   
b.	L’utilisateur peut ajouter ses habitudes d’hygiènes dentaire dans le journal de bord   
c.	L’utilisateur peut consulter le graphique d’évolution du brossage dans le journal de bord   
d.	L’utilisateur peut recevoir des conseils et des astuces liés à ses objectifs dans le journal de bord   


## **5.	UC05 - ENREGISTRER LES HABITUDES D’HYGIÈNE DENTAIRE :**
**Description :** l’utilisateur peut enregistrer ses habitudes d’hygiène dentaire, y compris la fréquence de brossage, le nettoyage de la langue, l’utilisation de fil dentaire et le bain de bouche

**Lien :** include – UC06 – Recevoir des conseils

**Scénarios :**   
a.	L’utilisateur peut enregistrer ses habitudes de brossage, y compris le nombre de fois qu’il se brosse les dents par jour   
b.	L’utilisateur peut enregistrer s’il pratique le nettoyage de la langue, l’utilisation du fil dentaire et le bain de bouche  
c.	L’utilisateur peut consulter et mettre à jour ses habitudes d’hygiène dentaire à tout moment  


## **6.	UC06 - SUIVRE L’ÉVOLUTION DU BROSSAGE :**
**Description :** l’utilisateur peut suivre l’évolution du brossage à l’aide d’un graphique qui affiche la fréquence de brossage au fil du temps   

**Scénarios :**   
a.	L’utilisateur peut consulter un graphique qui montre la fréquence du brossage (2x/j pdt au moins 2 min) au fil des jours, semaines ou mois.  
b.	L’utilisateur peut visualiser comment ses habitudes de brossage évoluent au fil du temps  


## **7.	UC07 - RECEVOIR DES CONSEILS/TIPS :**
**Description :** l’utilisateur peut accéder à des conseils et des astuces en fonction de ses objectifs et de ses habitudes d’hygiène dentaire   

**Scénarios :**   
a.	L’utilisateur peut consulter une section de conseils qui propose des informations personnalisées en fonction de ses objectifs et de ses habitudes  


## **8.	UC08 - CONSULTER DES ARTICLES :**
**Description :** l’utilisateur peut lire des articles et se documenter sur divers sujets liés à la santé dentaire, tels que la carie, la sécheresse buccale, la mauvaise haleine, le tartre et la plaque

**Scénarios :**   
a.	L’utilisateur peut parcourir une bibliothèque d’articles sur différents sujets dentaires  
b.	L’utilisateur peut sélectionner un article pour le lire et en savoir plus sur le sujet   




