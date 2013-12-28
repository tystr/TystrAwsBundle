<?php
namespace Tystr\Bundle\AwsBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tystr\Bundle\AwsBundle\DependencyInjection\TystrAwsExtension;

/**
 * @author Tyler Stroud <tyler@tylerstroud.com>
 */
class TystrAwsExtensionTest extends \PHPUnit_Framework_TestCase
{
    protected $container;
    protected $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new TystrAwsExtension();
    }

    public function testLoad()
    {
        $config = array(
            'access_key' => 'hello',
            'secret_access_key' => 'world',
            'region' => 'us-east-1',
        );
        $this->extension->load(array('tystr_aws' => $config), $this->container);

        $autoScaling = $this->container->get('tystr_aws.autoscaling');
        $this->assertInstanceOf('Aws\AutoScaling\AutoScalingClient', $autoScaling);

        $cloudFormation = $this->container->get('tystr_aws.cloudformation');
        $this->assertInstanceOf('Aws\CloudFormation\CloudFormationClient', $cloudFormation);

        $cloudFront = $this->container->get('tystr_aws.cloudfront');
        $this->assertInstanceOf('Aws\CloudFront\CloudFrontClient', $cloudFront);

        $cloudSearch = $this->container->get('tystr_aws.cloudsearch');
        $this->assertInstanceOf('Aws\CloudSearch\CloudSearchClient', $cloudSearch);

        $cloudTrail = $this->container->get('tystr_aws.cloudtrail');
        $this->assertInstanceOf('Aws\CloudTrail\CloudTrailClient', $cloudTrail);

        $directConnect = $this->container->get('tystr_aws.directconnect');
        $this->assertInstanceOf('Aws\DirectConnect\DirectConnectClient', $directConnect);

        $dynamoDb = $this->container->get('tystr_aws.dynamodb');
        $this->assertInstanceOf('Aws\DynamoDb\DynamoDbClient', $dynamoDb);

        $ec2 = $this->container->get('tystr_aws.ec2');
        $this->assertInstanceOf('Aws\Ec2\EC2Client', $ec2);

        $elastiCache = $this->container->get('tystr_aws.elasticache');
        $this->assertInstanceOf('Aws\ElastiCache\ElastiCacheClient', $elastiCache);

        $elasticBeanstalk = $this->container->get('tystr_aws.elasticbeanstalk');
        $this->assertInstanceOf('Aws\ElasticBeanstalk\ElasticBeanstalkClient', $elasticBeanstalk);

        $elasticLoadBalancing = $this->container->get('tystr_aws.elb');
        $this->assertInstanceOf('Aws\ElasticLoadBalancing\ElasticLoadBalancingClient', $elasticLoadBalancing);

        $elasticTranscoder = $this->container->get('tystr_aws.elastictranscoder');
        $this->assertInstanceOf('Aws\ElasticTranscoder\ElasticTranscoderClient', $elasticTranscoder);

        $emr = $this->container->get('tystr_aws.emr');
        $this->assertInstanceOf('Aws\Emr\EmrClient', $emr);

        $glacier = $this->container->get('tystr_aws.glacier');
        $this->assertInstanceOf('Aws\Glacier\GlacierClient', $glacier);

        $iam = $this->container->get('tystr_aws.iam');
        $this->assertInstanceOf('Aws\Iam\IamClient', $iam);

        $ImportExport = $this->container->get('tystr_aws.importexport');
        $this->assertInstanceOf('Aws\ImportExport\ImportExportClient', $ImportExport);

        $kinesis = $this->container->get('tystr_aws.kinesis');
        $this->assertInstanceOf('Aws\Kinesis\KinesisClient', $kinesis);

        $opsWorks = $this->container->get('tystr_aws.opsworks');
        $this->assertInstanceOf('Aws\OpsWorks\OpsWorksClient', $opsWorks);

        $rds = $this->container->get('tystr_aws.rds');
        $this->assertInstanceOf('Aws\Rds\RdsClient', $rds);

        $redshift = $this->container->get('tystr_aws.redshift');
        $this->assertInstanceOf('Aws\Redshift\RedshiftClient', $redshift);

        $route53 = $this->container->get('tystr_aws.route53');
        $this->assertInstanceOf('Aws\Route53\Route53Client', $route53);

        $s3 = $this->container->get('tystr_aws.s3');
        $this->assertInstanceOf('Aws\S3\S3Client', $s3);

        $ses = $this->container->get('tystr_aws.ses');
        $this->assertInstanceOf('Aws\Ses\SesClient', $ses);

        $simpleDb = $this->container->get('tystr_aws.simpledb');
        $this->assertInstanceOf('Aws\SimpleDb\SimpleDbClient', $simpleDb);

        $sns = $this->container->get('tystr_aws.sns');
        $this->assertInstanceOf('Aws\Sns\SnsClient', $sns);

        $sqs = $this->container->get('tystr_aws.sqs');
        $this->assertInstanceOf('Aws\Sqs\SqsClient', $sqs);

        $storageGatewy = $this->container->get('tystr_aws.storagegateway');
        $this->assertInstanceOf('Aws\StorageGateway\StorageGatewayClient', $storageGatewy);

        $sts = $this->container->get('tystr_aws.sts');
        $this->assertInstanceOf('Aws\Sts\StsClient', $sts);

        $support = $this->container->get('tystr_aws.support');
        $this->assertInstanceOf('Aws\Support\SupportClient', $support);

        $swf = $this->container->get('tystr_aws.swf');
        $this->assertInstanceOf('Aws\Swf\SwfClient', $swf);
    }
}
