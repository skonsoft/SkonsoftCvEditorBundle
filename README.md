Getting Started With SkonsoftCvEditorBundle
=========================================

## Prerequisites

This version of the bundle requires Symfony 2.1.

#### Translations

If you wish to use default texts provided in this bundle, you have to make sure you have translator enabled in your config:

    # app/config/config.yml

    framework:
        translator: { fallback: en }

For more information about translations, check [Symfony documentation](http://symfony.com/doc/current/book/translation.html).

## Installation

Installation is a quick 4 steps process:

1. Download SkonsoftCvEditorBundle
2. Enable the Bundle
3. Configure your application's config.yml
4. Update your database

### Step 1: Install SkonsoftCvEditorBundle

The preferred way to install this bundle is to rely on [Composer](http://getcomposer.org).
Just check on [Packagist](http://packagist.org/packages/friendsofsymfony/oauth-server-bundle) the version you want to install (in the following example, we used "dev-master") and add it to your `composer.json`:

``` js
{
    "require": {
        // ...
        "skonsoft/cv-editor-bundle": "dev-master"
    }
}
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Skonsoft\Bundle\CvEditorBundle(),
    );
}
```
### Step 3: Configure your config.yml

This bundle needs a service provider that parses doc and pdf cv into our model (Profile).

SkonsoftCvEditorBundle comes with a default service provider: the TextKernelProvider which connect to TextKernel to parse the CV.

So, if you want to use the default TextKernelProvider, you should have a valid account in TextKernel. Otherwise, you should implement your own
provider. See Section Custom Provider for more information.

To specify your provider, just add it to config.yml

```
#app/config/config.yml
#the provider to use
skonsoft_cv_editor:
    provider_service_id: skonsoft_cv_editor.textkernel_provider
```

If you have a valid TextKernel Provider, you should add your authentication parameters in config.yml. So, your config.yml should look like:
```
#the provider to use
skonsoft_cv_editor:
    provider_service_id: skonsoft_cv_editor.textkernel_provider
    
parameters:
    skonsoft_cv_editor.textkernel_provider.username: Text_kernel_username
    skonsoft_cv_editor.textkernel_provider.password: Text_kernel_password
    skonsoft_cv_editor.textkernel_provider.account:  Text_kernel_account
```

Now, just update your database:

### Step 3: Update your database

```
./app/console doctrine:schema:update --force
```

Now, you can browse, the CVs using: cv/profile/ to list all cv profiles, you can add, upload and edit cvs.

## Building Custom provider,

it is very simple, just create a new Class that extends Skonsoft\Bundle\CvEditorBundle\Provider\BaseProvider

your own new provider, should implement the inherited abstract method: 
```
    /**
     * loads a document into CvProfile object
     * 
     * @param string $document the path of document to load (doc, pdf)
     * @return Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile
     */
    public function load($document){
        // your logic here to parse the document and return a profile object (Skonsoft\Bundle\CvEditorBundle\Entity\CvProfile)
    }
```

For more information, take a look at Skonsoft\Bundle\CvEditorBundle\Provider\TextKernelProvider how it was implemented.

Now, your new provider class is ready to use, so just you need to inform the controller to use it by declaring it as a service.

After that, just replace the default service by the new:

```
#app/config/config.yml
#the provider to use
skonsoft_cv_editor:
    provider_service_id: skonsoft_cv_editor.custom_provider # the new created service 
```

Now, try it !
