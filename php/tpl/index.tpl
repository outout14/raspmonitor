
    <!-- Jumbo -->
    <div class="jumbotron" style="padding: 1%">
        <h1>RaspMonitor</h1>
        <p>{$JUMBO_DESCRIPT}</p>
    </div>

    <!-- Container -->
    <div class="container">

        <!-- Panel -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{$INFOS_TITLE} {$srvName}</h3>
            </div>
            <div class="panel-body">
                <p>{$INFOS_IP} {$ipAdrr}</p>
                <p>{$INFOS_NETWORKNAME} {$srvName}</p>
                <p>
                    {$INFOS_PHPVER} <a href="{$phpVer[1]}" target="_blank">{$phpVer[0]}</a>
                </p>

                <p>{$INFOS_HTTPSRV} {$serverSoftware}</p>

                {if !$webserver_version}
                    <p>Can't find http server version</p>
                {else}
                    <p>
                        {$INFOS_HTTPVER} {$webserver_version['version']}
                    </p>
                {/if}


                <p>{$INFOS_OS} {$InformationOS}</p>

                {if $isLinux}
                    <p>{$INFOS_KERNELVER} : {$KernelOS}</p>
                    <p>
                        {$INFOS_TEMP}
                        <input value="{$temp}" id="tempValue">
                    </p>

                    <div id="raspitemp"></div>
                {/if}
            </div>
        </div>
        <!-- end panel -->

        <!-- Panel -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{$PORTS_TITLE} {$srvName}</h3>
            </div>
            <div class="panel-body">
                <p>{$PORTS_SSH} : {$checkSSH}</p>
                <p>{$PORTS_FTP} : {$checkFTP}</p>
            </div>
        </div>
        <!-- end panel -->

        <!-- Panel -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{$RASPINFO_TITLE}</h3>
            </div>
            <div class="panel-body">
                <p>{$RASPINFO_VERSION} {$RASPMONITOR_VERSION}</p>
            </div>
        </div>
        <!-- end panel -->

    </div>
</div>
