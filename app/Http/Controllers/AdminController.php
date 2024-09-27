namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function store(StoreAdminRequest $request)
    {
        return Admin::create($request->validated());
    }

    public function show(Admin $Admin)
    {
        return $Admin;
    }

    public function update(UpdateAdminRequest $request, Admin $Admin)
    {
        $Admin->update($request->validated());
        return $Admin;
    }

    public function destroy(Admin $Admin)
    {
        $Admin->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
