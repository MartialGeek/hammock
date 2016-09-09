<?php

namespace Martial\Hammock\API\Server\VO;

interface ServerStatisticsVOInterface
{
    const SECTION_COUCHDB_AUTH_CACHE_HITS = 'couchdb/auth_cache_hits';
    const SECTION_COUCHDB_AUTH_CACHE_MISSES = 'couchdb/auth_cache_misses';
    const SECTION_COUCHDB_DATABASE_READS = 'couchdb/database_reads';
    const SECTION_COUCHDB_DATABASE_WRITES = 'couchdb/database_writes';
    const SECTION_COUCHDB_OPEN_DATABASE = 'couchdb/open_database';
    const SECTION_COUCHDB_OPEN_OS_FILES = 'couchdb/open_os_files';
    const SECTION_COUCHDB_REQUEST_TIME = 'couchdb/request_time';

    const SECTION_HTTPD_REQUEST_METHODS_COPY = 'httpd_request_methods/COPY';
    const SECTION_HTTPD_REQUEST_METHODS_DELETE = 'httpd_request_methods/DELETE';
    const SECTION_HTTPD_REQUEST_METHODS_GET = 'httpd_request_methods/GET';
    const SECTION_HTTPD_REQUEST_METHODS_HEAD = 'httpd_request_methods/HEAD';
    const SECTION_HTTPD_REQUEST_METHODS_POST = 'httpd_request_methods/POST';
    const SECTION_HTTPD_REQUEST_METHODS_PUT = 'httpd_request_methods/PUT';

    const SECTION_HTTPD_STATUS_CODE_200 = 'httpd_status_code/200';
    const SECTION_HTTPD_STATUS_CODE_201 = 'httpd_status_code/201';
    const SECTION_HTTPD_STATUS_CODE_202 = 'httpd_status_code/202';
    const SECTION_HTTPD_STATUS_CODE_301 = 'httpd_status_code/301';
    const SECTION_HTTPD_STATUS_CODE_304 = 'httpd_status_code/304';
    const SECTION_HTTPD_STATUS_CODE_400 = 'httpd_status_code/400';
    const SECTION_HTTPD_STATUS_CODE_401 = 'httpd_status_code/401';
    const SECTION_HTTPD_STATUS_CODE_403 = 'httpd_status_code/403';
    const SECTION_HTTPD_STATUS_CODE_404 = 'httpd_status_code/404';
    const SECTION_HTTPD_STATUS_CODE_405 = 'httpd_status_code/405';
    const SECTION_HTTPD_STATUS_CODE_409 = 'httpd_status_code/409';
    const SECTION_HTTPD_STATUS_CODE_412 = 'httpd_status_code/412';
    const SECTION_HTTPD_STATUS_CODE_500 = 'httpd_status_code/500';

    const SECTION_HTTPD_BULK_REQUESTS = 'httpd/bulk_requests';
    const SECTION_HTTPD_CLIENTS_REQUESTING_CHANGES = 'httpd/clients_requesting_changes';
    const SECTION_HTTPD_REQUESTS = 'httpd/requests';
    const SECTION_HTTPD_TEMPORARY_VIEW_READS = 'httpd/temporary_view_reads';
    const SECTION_HTTPD_VIEW_READS = 'httpd/view_reads';

    /**
     * @return string
     */
    public function getSection();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return float
     */
    public function getCurrent();

    /**
     * @return float
     */
    public function getSum();

    /**
     * @return float
     */
    public function getMean();

    /**
     * @return float
     */
    public function getStandardDeviation();

    /**
     * @return float
     */
    public function getMin();

    /**
     * @return float
     */
    public function getMax();
}
