Step 1: Download the Bundle
----------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash

    $ composer require ss/twitter-bundle "*@dev" -dev
```
This command requires you to have Composer installed globally, as explained
in the `installation chapter`_ of the Composer documentation.

Step 1: Enable the Bundle
--------------------

Then, enable the bundle by adding the following line in the ``app/AppKernel.php``
file of your project:

```php
<?php
    // app/AppKernel.php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...
                new SS\TwitterBundle\SSTwitterBundle(),
            );
            // ...
        }
    }
```
Step 4: Configure your application's config.yml
--------------------

Below is the configuration necessary to use the NmTwitterApiBundle
in your application:

```yaml

    # app/config/config.yml
    parameters:
        consumer_key: YOUR_CONSUMER_KEY
        consumer_secret: YOUR_CONSUMER_SECRET
        
Step 5: How to use :
--------------------
You should call the nm_twitter.manager service, this is an exemple on controller :

```php
<?php
    /**
     * @Route("/app/hometimeline", name="hometimeline")
     */
    public function indexAction()
    {
        $twitter = $this->get('ss_twitter_api');
        $twitter_object = $twitter->getUserTimeLine('salemsaiid',10);

      
        
        return $this->render('AppBundle:Default:index.html.twig', array(
            'twitter_object' => $twitter_object
        ));
    }
```
