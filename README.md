TystrAwsBundle
==============
[![Build Status](https://travis-ci.org/tystr/TystrAwsBundle.png?branch=master)](https://travis-ci.org/tystr/TystrAwsBundle)

This bundle integrates the [AWS SDK for PHP](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html) into symfony2.

Installation
------------

Add the following to your composer.json:
```JSON
{
    "require": {
        "tystr/aws-bundle": "dev-master@dev"
    }
}
```

Install the bundle using composer:
```sh
$ php composer.phar update tystr/aws-bundle
```

Finally, register the bundle with your application:

```PHP
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tystr\Bundle\AwsBundle\TystrAwsBundle()
    );
}
```
Now you'll just need to set some configuration parameters, and you're ready to go!

Configuration
-------------
Configuration is pretty simple. Each parameter you set here is passed to the factory which will create any aws service you request.

```YAML
tystr_aws:
    access_key: YOUR_AWS_ACCESS_KEY
    secret_access_key: YOUR_AWS_SECRET_ACCESS_KEY
    region: us-east-1 # You must set a default region to be passed to the aws clients
```

Usage
-----

For example, to fetch an instance of the s3 client:
```PHP
$s3 = $this->get('tystr_aws.s3');
```
The following services are exposed by this bundle:
<table>
  <tr><td>tystr_aws.s3</td></tr>
  <tr><td>tystr_aws.route53</td></tr>
  <tr><td>tystr_aws.ec2</td></tr>
  <tr><td>tystr_aws.autoscaling</td></tr>
  <tr><td>tystr_aws.cloudformation</td></tr>
  <tr><td>tystr_aws.cloudfront</td></tr>
  <tr><td>tystr_aws.cloudsearch</td></tr>
  <tr><td>tystr_aws.coudtrail</td></tr>
  <tr><td>tystr_aws.cloudwatch</td></tr>
  <tr><td>tystr_aws.datapipeline</td></tr>
  <tr><td>tystr_aws.directconnect</td></tr>
  <tr><td>tystr_aws.dynamodb</td></tr>
  <tr><td>tystr_aws.elasticache</td></tr>
  <tr><td>tystr_aws.elasticbeanstalk</td></tr>
  <tr><td>tystr_aws.elb</td></tr>
  <tr><td>tystr_aws.elastictranscoder</td></tr>
  <tr><td>tystr_aws.em</td></tr>
  <tr><td>tystr_aws.glacier</td></tr>
  <tr><td>tystr_aws.iam</td></tr>
  <tr><td>tystr_aws.importexport</td></tr>
  <tr><td>tystr_aws.kinesis</td></tr>
  <tr><td>tystr_aws.opsworks</td></tr>
  <tr><td>tystr_aws.rds</td></tr>
  <tr><td>tystr_aws.redshift</td></tr>
  <tr><td>tystr_aws.ses</td></tr>
  <tr><td>tystr_aws.simpledb</td></tr>
  <tr><td>tystr_aws.sns</td></tr>
  <tr><td>tystr_aws.sqs</td></tr>
  <tr><td>tystr_aws.storagegateway</td></tr>
</table>

Profit!
