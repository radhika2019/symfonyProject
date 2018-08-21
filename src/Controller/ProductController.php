<?php

namespace App\Controller;
use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="_product")
     */
    public function addProduct(Request $request)
    {

        if($request->isXmlHttpRequest()) {

            $productname = $request->request->get('name');
            $description = $request->request->get('description');
            $quantity = $request->request->get('quantity');


        /*$entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
                'Insert into
        App\Entity\Product
        WHERE p.price > :price
        ORDER BY p.price ASC
        INSERT INTO App\Entity\Product(`id`, `name`, `description`, `quantity`) VALUES $productname, $description, $quantity)'
            );
        return $query->execute();*/
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName($productname);
        $product->setQuantity($quantity);
        $product->setDescription($description);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
         return new Response("Record Inserted into table successfully");
        }else{
            return new Response("Something Wrong");
        }


    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $product = $repository->find($id);

        return $this->render('product/single.html.twig', ['product' => $product]);

    }

    /**
     * @Route("/manageProduct", name="product_add")
     */
    public function productList()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $product = $repository->findAll();

        return $this->render('product/manageProduct.html.twig', ['product' => $product]);

    }

    /**
     * @Route("/delProduct", name="del_product")
     */
    public function deleteProduct(Request $request){

        if($request->isXmlHttpRequest()) {
           $del_id = $request->request->get('del_id');
        }

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'DELETE  App\Entity\Product p
        WHERE p.id= :del_id')->setParameter("del_id", $del_id);;

        $query->execute();

        $sql=$query->getSQL();

        var_dump($sql);

        $parameters=$query->getParameters();
        echo "<pre>";
        print_r($parameters);
        echo "</pre>";
        //var_dump($parameters);

        return new Response("Record Deleted");

    }

}
