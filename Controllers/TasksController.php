<?php namespace App\Controllers;
      use App\models\TaskModel;

class TasksController extends Controller
{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //On instancie le modèle
            $model = new TaskModel;
            $tasks = $model->findAll();


            if(count($tasks) > 0){
                
            http_response_code(200);
            
            // On encode en json et on envoi 
            echo json_encode($tasks);
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
     * Cette methode affiche un seul task
     * condition id
     */
    public function read(int $id){

         if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //On instancie le modèle
            $model = new TaskModel;
            $task = $model->find($id);


            if(count($task) > 0){
                //var_dump($users);
            http_response_code(200);
            
            // On encode en json et on envoi 
            echo json_encode($task);
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
     * Cette methode affiche les ou le task
     * condition attribut
     */
    public function readBy(){

         if($_SERVER['REQUEST_METHOD'] == 'GET'){

            //On instancie le modèle
            $model = new TaskModel;
            
            // On récupère les informations envoyées
            $donnees = json_decode(file_get_contents("php://input"),true);

            //On recupère la ou les données
            $task = $model->findBy($donnees);


            if(count($task) > 0){

            http_response_code(200);
            
            // On encode en json et on envoi 
            echo json_encode($task);
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
     * Cette methode crée un task
     * 
     */
    public function new(){

         if($_SERVER['REQUEST_METHOD'] == 'POST'){
                

                // On instancie le task
                $model = new TaskModel();
                

                // On récupère les informations envoyées
                $donnees = json_decode(file_get_contents("php://input"),true);
                
                //var_dump($donnees);die;
                
                if(!empty($donnees)){
                    // Ici on hydrate les données
                    $task = $model->hydrate($donnees);
                    //var_dump($users);die;

                    //Si le task est crée
                    if($model->create($task)){
                        // On envoie un code 201
                        http_response_code(201);
                        echo json_encode(["message" => "L'ajout a été effectué"]);
                    }else{
                        // Ici la création n'a pas fonctionné
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
     * Cette methode fait une mise à jour d'un task
     * 
     */
    public function update(int $id){

         if($_SERVER['REQUEST_METHOD'] == 'PUT'){
                

                // On instancie le task
                $model = new TaskModel();
                

                // On récupère les informations envoyées
                $donnees = json_decode(file_get_contents("php://input"),true);

                
               // var_dump($donnees);die;
                
                if(!empty($donnees)){
                    // Ici on a reçu les données
                    $task = $model->hydrate($donnees);
                    
                    
                    //Modification du task
                    if($model->Update($id,$task)){
                        // Ici la modification a fonctionné
                        // On envoie un code 201
                        http_response_code(201);
                        echo json_encode(["message" => "La modification à été effectué"]);
                    }else{
                        // Ici la modification n'a pas fonctionné
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
     * Cette methode supprime un task
     * par id
     */
    public function delete(int $id){

         if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

            //On instancie le modèle
            $model = new TaskModel;
            

            //Supprimer le task
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