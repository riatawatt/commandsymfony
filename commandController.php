<?php
namespace App\Controller;	

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;	
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;



class {
  /**
	 * @Route("clearcache")
	 */
	public function clearcache (KernelInterface $kernel) {
		$application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
           'command' => 'cache:clear',
           // (optional) define the value of command arguments
        //    'fooArgument' => 'barValue',
           // (optional) pass options to the command
           '--env' => 'prod',
	   // '--no-warmup' => true
        ));

        // You can use NullOutput() if you don't need the output
        $output = new BufferedOutput();
        $application->run($input, $output);

        // return the output, don't use if you used NullOutput()
        $content = $output->fetch();

        // return new Response(""), if you used NullOutput()
        return new Response('<pre>'.$content. '</pre>');
		// return $this->render('command/clearcache.html.twig');
	}
}
