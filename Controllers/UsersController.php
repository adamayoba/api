<?php

namespace App\Controllers;
use App\Models\UserModel;

class UsersController extends Controller
{
   /**
    * Cette methode affiche tout les users
    *
    */
    public function index(){

         if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //On instancie le modèle
            $model = new UserModel;
            //On recupère tout les users
            $users = $model->findAll();
            
            if(count($users) > 0){
                //var_dump($users);
            http_response_code(200);
            
            // On encode en json et on envoi 
            echo json_encode($users);
            }else{
                echo json_encode(["message" => "La base de donnée est vide"]);
            }
        }else{
            // On gère l'erreur
            http_response_code(405);
            echo json_encode(["message" => "La méthode n'est pas autorisée"]);

             }
    }

    /**
     * Cette methode affiche un seul user
     * par id
     */
    public function read(int $id){

         if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //On instancie le modèle
            $model = new UserModel;
            $user = $model->find($id);


            if(count($user) > 0){
                //var_dump($users);
            http_response_code(200);
            
            // On encode en json et on envoi 
            echo json_encode($user);
            }else{
                echo json_encode(["message" => "La base de donnée est vide"]);
            }
        }else{
            // On gère l'erreur
            http_response_code(405);
            echo json_encode(["message" => "La méthode n'est pas autorisée"]);

             }
    }

    /**
     * Cette methode affiche les ou l'user
     * condition attribut
     */
    public function readBy(){

         if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //On instancie le modèle
            $model = new UserModel;
            
            // On récupère les informations envoyées
            $donnees = json_decode(file_get_contents("php://input"),true);

            //On recupère la ou les données
            $user = $model->findBy($donnees);


            if(count($user) > 0){
                //var_dump($users);

            http_response_code(200);
            
            // On encode en json et on envoi 
            echo json_encode($user);
            }else{
                echo json_encode(["message" => "La base de donnée est vide"]);
            }
        }else{
            // On gère l'erreur
            http_response_code(405);
            echo json_encode(["message" => "La méthode n'est pas autorisée"]);

             }
    }

    /**
     * Cette methode crée un user
     * 
     */
    public function create(){

         if($_SERVER['REQUEST_METHOD'] == 'POST'){
                

                // On instancie le user
                $model = new UserModel();
                

                // On récupère les informations envoyées
                $donnees = json_decode(file_get_contents("php://input"),true);
                
                //var_dump($donnees);die;
                
                if(!empty($donnees)){
                    // Ici on a reçu les données
                    $user = $model->hydrate($donnees);
                    //var_dump($users);die;
                    
                    //Creation de user
                    if($model->create($user)){
                        // Ici la modication a fonctionné
                        // On envoie un code 201
                        http_response_code(201);
                        echo json_encode(["message" => "L'ajout a été effectué"]);
                    }else{
                        // Ici la modification n'a pas fonctionné
                        // On envoie un code 503
                        http_response_code(503);
                        echo json_encode(["message" => "L'ajout n'a pas été effectué"]);         
                    }
                }
            }else{
                // On gère l'erreur
                http_response_code(405);
                echo json_encode(["message" => "La méthode n'est pas autorisée"]);
            }

    }


    /**
     * Cette methode fait une mise à jour d'un user
     * 
     */
    public function update(int $id){

         if($_SERVER['REQUEST_METHOD'] == 'PUT'){
                

                // On instancie le user
                $model = new UserModel();
                

                // On récupère les informations envoyées
                $donnees = json_decode(file_get_contents("php://input"),true);

                
               // var_dump($donnees);die;
                
                if(!empty($donnees)){
                    // Ici on a reçu les données
                    $user = $model->hydrate($donnees);
                    
                    
                    //Creation de user
                    if($model->Update($id,$user)){
                        // Ici la création a fonctionné
                        // On envoie un code 201
                        http_response_code(201);
                        echo json_encode(["message" => "La modification à été effectué"]);
                    }else{
                        // Ici la création n'a pas fonctionné
                        // On envoie un code 503
                        http_response_code(503);
                        echo json_encode(["message" => "La modification n'a pas été effectué"]);         
                    }
                }
            }else{
                // On gère l'erreur
                http_response_code(405);
                echo json_encode(["message" => "La méthode n'est pas autorisée"]);
            }

    }

    /**
     * Cette methode supprime un user
     * par id
     */
    public function delete(int $id){

         if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

            //On instancie le modèle
            $model = new UserModel;
            

            //Supprimer le user
            if($model->delete($id)){
            
                http_response_code(200);
                
                // On encode en json et on envoi 
                echo json_encode(["message" => "Suppression effectué avec succès"]);
                }else{
                    echo json_encode(["message" => "Echèc de suppression"]);
            }
        }else{
            // On gère l'erreur
            http_response_code(405);
            echo json_encode(["message" => "La méthode n'est pas autorisée"]);

             }
    }


}