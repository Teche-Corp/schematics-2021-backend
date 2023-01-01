<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service
                            {service_name : The service\'s name, if it is on a subdirectory use /. ex: Test/AClass/One}
                            {--req=default : Make request with custom name, if more than one use , as delimiter. ex: OneRequest,TwoRequest}
                            {--res=default : Make response with custom name, if more than one use , as delimiter. ex: OneRes,TwoRes}
                            {--service-exists : Not making new services, can be used to only create request and response}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For creating service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service_name = $this->argument('service_name');
        $req = $this->option('req');
        $res = $this->option('res');
        $service_exists = $this->option('service-exists');

        chdir(base_path().'/app/Http');
        if (!is_dir('Services') && !mkdir('Services')) {
            throw new Exception("Services root folder creation fail.");
        }
        chdir('Services');

        if (!is_dir($service_name) && !mkdir($service_name, 0777, true)) {
            throw new Exception("Folder creation fail.");
        }
        chdir($service_name);

        $service_path = str_replace("/", "\\", 'App\Http\Services\\'.$service_name);
        $service_name = explode("/", $service_name);
        $service_name = $service_name[sizeof($service_name) - 1];

        $default_req = $req;
        if ($req && $req != 'default') {
            $req = explode(",", $req);
            $default_req = $req[sizeof($req) - 1];
        } else if (!$req) {
            $req = [$service_name.'Request'];
            $default_req = $service_name.'Request';
        }

        $default_res = $res;
        if ($res && $res != 'default') {
            $res = explode(",", $res);
            $default_res = $res[sizeof($res) - 1];
        } else if (!$res) {
            $res = [$service_name.'Response'];
            $default_res = $service_name.'Response';
        }

        if (file_exists($service_name.'Service.php') || $service_exists) {
            $this->info("Service already exists, skipping service creation....");
        } else {
            $this->info("Creating service...");
            $write_service = file_put_contents(
                $service_name.'Service.php',
                "<?php\n\n".
                "namespace $service_path;\n\n".
                "class ".$service_name."Service\n{\n".
                "    public function execute(".(($default_req != 'default'? $default_req.' $request' : "")).")\n".
                "    {\n".
                "        return".(($default_res != 'default'? ' new '.$default_res.'()' : "")).";\n".
                "    }\n".
                "}"
            );

            if (!$write_service) {
                throw new Exception("Service creation failed.");
            }
        }

        if ($req != 'default') {
            foreach ($req as $key => $r) {
                $this->info("Creating ". $r ." request...");
                if (file_exists($r.'.php')) {
                    $this->info("Service request ". $r ." already exists, skipping request creation....");
                } else if ($r != 'default') {
                    $write_request = file_put_contents(
                        $r.'.php',
                        "<?php\n\n".
                        "namespace $service_path;\n\n".
                        "class ".$r."\n{\n".
                        "    public function __construct()\n".
                        "    {\n".
                        "    }\n".
                        "}"
                    );
    
                    if (!$write_request) {
                        $this->error('Request '. $r .' creation failed');
                    }
                }
            }
        }

        if ($res != 'default') {
            foreach ($res as $key => $r) {
                $this->info("Creating ". $r ." response...");
                if (file_exists($r.'.php')) {
                    $this->info("Service response ". $r ." already exists, skipping response creation....");
                } else if ($r != 'default') {
                    $write_response = file_put_contents(
                        $r.'.php',
                        "<?php\n\n".
                        "namespace $service_path;\n\n".
                        "use JsonSerializable;\n\n".
                        "class ".$r." implements JsonSerializable\n{\n".
                        "    public function __construct()\n".
                        "    {\n".
                        "    }\n\n".
                        "    public function jsonSerialize()\n".
                        "    {\n".
                        "        return [];\n".
                        "    }\n".
                        "}"
                    );
    
                    if (!$write_response) {
                        $this->error('Response '. $r .' creation failed');
                    }
                }
            }
        }

        $this->info('Command success.');
        return 0;
    }
}
