<?php

namespace Aoeng\Laravel\Admin\Version\Http\Controllers;

use Aoeng\Laravel\Admin\Version\Models\Version;
use Aoeng\Laravel\Support\Traits\ResponseJsonActions;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * @group APP版本
 * Class VersionController
 * @package App\Http\Controllers
 */
class VersionController extends Controller
{
    use ResponseJsonActions;

    /**
     * 最新APP version_index
     * @return JsonResponse
     */
    public function index()
    {
        $version = Version::query()
            ->where('published_at', '<=', now())
            ->orderByDesc('version')->first();

        return $this->responseJson($version);
    }

}
