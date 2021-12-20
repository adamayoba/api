Les endpoints disponible sur cette api:

pour cette api j'ai utilisé comme server Apache :
phpmyadmin 

J'ai du configurer l'hôte virtuel d'Apache pour pointer mon dossier 
public comme l'entrée principale de mon site dans le fichier conf
"C:/xampp/apache/conf/extra/httpd-vhosts.conf" :

define ROOT "C:/xampp/htdocs/api/public"
define SITE "api"

<VirtualHost *:80>
    DocumentRoot "${ROOT}"
        ServerName ${SITE}
    ServerAlias *.${SITE}
        <Directory "${ROOT}">
            AllowOverride All
            Require all granted
        </Directory>
</VirtualHost>



et pour la base de donnée: 
mysql
pour mon cas j'ai utilisé XAMPP

ci-joint la requête pour la creation de la base de donnée: 
api_test.sql dans le projet

## Niveau user:

Endpoint de Creation d'un utilisateur:
http://localhost/users/create

Pour créer un user pas besoin de l'id sachant qu'il est auto-increment

{
    "name": "Test",
    "email": "tes@gmail.com"
}

---

Endpoint de Modification d'un utilisateur:
http://localhost/users/update/id

Pour modifier un user

{
    "name": "Testmodif",
    "email": "tesmodif@gmail.com"
}

---

Endpoint d'affichage de tout les utilisateurs:
http://localhost/users

---

Endpoint d'affichage d'un seul utilisateur:
http://localhost/users/read/id

---

Endpoint d'affichage d'un ou plusieurs utilisateur(s)
par condition d'un ou plusieur attributs:
http://localhost/users/readBy

Recherche sur user

{
    "name": "Testsearch"

}

---

Endpoint de suppression d'un utilisateur:
http://localhost/users/delete/id


---

---

---

## Niveau task:

Endpoint de Creation d'une tâche:
http://localhost/tasks/create

Pour créer un task pas besoin de l'id sachant qu'il est auto-increment,
valable aussi pour la creation_date qui est en curent par contre il faudra un
user_id existant sinon conflit avec la db

{
    "user_id": 1,
    "title": "Test",
    "description": "Pour le test",
    "status": "status"
  
 }

---

Endpoint de Modification d'une tâche:
http://localhost/tasks/update/id

Pour modifier un task pas besoin de la creation_date puis qu'on parle
de la date de création

{
    "user_id": 1,
    "title": "Testmodif"
    "description": "Pour le tester la modification",
    "status": "status"
  
 }

---

Endpoint d'affichage de toutes les tâches:
http://localhost/tasks

---

Endpoint d'affichage d'une seule tâche:
http://localhost/tasks/read/id

---

Endpoint d'affichage d'un ou plusieurs task(s)
par condition d'un ou plusieur attributs:
http://localhost/tasks/readBy

Recherche sur user

{

    "user_id": 1

}

---

Endpoint de suppression d'une tâche:
http://localhost/tasks/delete/id

---
---
---
