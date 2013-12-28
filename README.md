TystrAwsBundle
==============
[![Build Status](https://travis-ci.org/tystr/TystrAwsBundle.png?branch=master)](https://travis-ci.org/tystr/TystrAwsBundle)

This bundle integrates the [Amazon SDK for PHP](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html) into symfony2.

Configuration
-------------

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

Profit!
