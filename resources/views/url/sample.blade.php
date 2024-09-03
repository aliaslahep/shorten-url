Route::get('/{userRoute}', [CustomRouteController::class, 'handleUserRoute'])->name('user.route');


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserRoute;

class CustomRouteController extends Controller
{
    public function handleUserRoute($userRoute, Request $request)
    {
        $route = UserRoute::where('route', $userRoute)->first();

        return view($route->view, compact('route'));
    }
}


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoute extends Model
{
    protected $fillable = ['route', 'view', 'controller', 'action'];

    // Add any necessary relationships or methods here
}



<form action="{{ route('user.route.create') }}" method="POST">
    @csrf
    <label for="route">Route</label>
    <input type="text" name="route" id="route" required>

    <label for="view">View</label>
    <input type="text" name="view" id="view" required>

    <button type="submit">Add Route</button>
</form>



public function storeUserRoute(Request $request)
{
    $validated = $request->validate([
        'route' => 'required|string|unique:user_routes,route',
        'view' => 'required|string',
    ]);

    UserRoute::create($validated);

    return redirect()->back()->with('success', 'Route added successfully!');
}



Route::post('/user/route', [CustomRouteController::class, 'storeUserRoute'])->name('user.route.create');
