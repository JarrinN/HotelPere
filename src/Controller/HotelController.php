<?php
    namespace App\Controller;

    use App\Entity\Habitacion;
    use App\Entity\TipoHabitacion;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class HotelController extends AbstractController
    {

        /**
        * @Route("catalogo",name="catalogo") 
        */
        public function catalogo()
        {
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitaciones = $repositorio->findAll();
            return $this->render("catalogo.html.twig",array("habitaciones" => $habitaciones));
        }

        /**
        * @Route("catalogo/individual",name="individual") 
        */
        public function listarIndividual(){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitaciones = $repositorio->findBy(["Tipo" => 1]);
            return $this->render("individual.html.twig",array("habitaciones" => $habitaciones));
        }

        /**
        * @Route("catalogo/doble",name="doble") 
        */
        public function listarDoble(){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitaciones = $repositorio->findBy(["Tipo" => 2]);
            return $this->render("doble.html.twig",array("habitaciones" => $habitaciones));
        }

        /**
        * @Route("catalogo/triple",name="triple") 
        */
        public function listarTriple(){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitaciones = $repositorio->findBy(["Tipo" => 3]);
            return $this->render("triple.html.twig",array("habitaciones" => $habitaciones));
        }

        /**
        * @Route("catalogo/familiar",name="familiar") 
        */
        public function listarFamiliar(){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitaciones = $repositorio->findBy(["Tipo" => 4]);
            return $this->render("familiar.html.twig",array("habitaciones" => $habitaciones));
        }

        /**
        * @Route("catalogo/quad",name="quad") 
        */
        public function listarQuad(){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitaciones = $repositorio->findBy(["Tipo" => 5]);
            return $this->render("quad.html.twig",array("habitaciones" => $habitaciones));
        }

        /** 
        * @Route("catalogo/detalles/{num}",name="info") 
        */
        public function destalles($num){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $habitacion = $repositorio->findOneBy(["num" => $num]);  
            //$img = "data:image/jpeg;base64,".base64_encode( $habitacion['pic'] );

            return $this->render("info.html.twig",array("room" => $habitacion));
        }

        /**
        * @Route("catalogo/editar/{num}",name="editar") 
        */
        public function editarRoom($num){
            $repositorio = $this->getDoctrine()->getRepository(Habitacion::class);
            $room = $repositorio->findOneBy(["num"=>$num]);

            return $this->render("editRoom.html.twig",array("room"=>$room));
        }

        
    }
?>