namespace App\Http\Controllers;

use App\Models\Admin1;
use App\Http\Requests\StoreAdmin1Request;
use App\Http\Requests\UpdateAdmin1Request;
use Illuminate\Http\Response;

class Admin1Controller extends Controller
{
    public function index()
    {
        return Admin1::all();
    }

    public function store(StoreAdmin1Request $request)
    {
        return Admin1::create($request->validated());
    }

    public function show(Admin1 $Admin1)
    {
        return $Admin1;
    }

    public function update(UpdateAdmin1Request $request, Admin1 $Admin1)
    {
        $Admin1->update($request->validated());
        return $Admin1;
    }

    public function destroy(Admin1 $Admin1)
    {
        $Admin1->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
