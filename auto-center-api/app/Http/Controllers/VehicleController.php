<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * @OA\Info(
 *   title="AC API",
 *   version="1.0",
 *   description="API for Startup",
 *   @OA\Contact(
 *     email="farhadandproject@gmail.com",
 *     name="Farhad Haider"
 *   )
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 */
/**
 * @OA\Get(
 *     path="/vehicle/{id}",
 *     summary="Get a specific vehicle by ID",
 *     description="Retrieve detailed information about a specific vehicle.",
 *     operationId="getVehicleById",
 *     tags={"Vehicles"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the vehicle to retrieve",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\Property(type="object", ref="#/components/schemas/Vehicle")
 *     ),
 *   security={{ "apiAuth": {} }}
 *
 * )
 *
 * @param int $id
 * @return \Illuminate\Http\JsonResponse
 */
/**
 * @OA\Get(
 *     path="/vehicles",
 *     summary="Get all vehicles",
 *     description="Retrieve a list of all vehicles with detailed information.",
 *     operationId="getAllVehicles",
 *     tags={"All Vehicles"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Vehicle")
 *         )
 *     ),
 *     security={{ "apiAuth": {} }}
 * )
 *
 * @return \Illuminate\Http\JsonResponse
 */

/**
 * @OA\Post(
 *     path="/search",
 *     summary="Search vehicles",
 *     tags={"Search"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(property="q", type="string", description="Search query")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer"),
 *                 @OA\Property(property="title", type="string")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Result not found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string")
 *         )
 *     ),
 *   security={{ "apiAuth": {} }}
 * )
 */
class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with(['make', 'model', 'color', 'dealership', 'images'])
            ->get();
        return response()->json($vehicles);
    }

    public function show($id)
    {
        $vehicle = Vehicle::with(['make', 'model', 'color', 'dealership', 'images'])
            ->find($id);

        if (!$vehicle) {
            return response()->json(['error' => 'Vehicle not found'], 404);
        }

        return response()->json($vehicle);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $search = $query;
        $search = explode(' ', $search);

        $vehicles = \App\Models\Vehicle::select('model as id', 'title')
            ->leftJoin('dealerships', 'dealerships.id', '=', 'dealership_id')
            ->where('dealerships.is_enabled', '=', 1)
            ->where(function ($query) use ($search) {
                foreach ($search as $term) {
                    $query->orWhere('title', 'like', '%' . $term . '%');
                }
            })
            ->get();

        if ($vehicles->count() > 0) {
            return $vehicles;
        } else {
            return ['error' => 'Sorry, result not found'];
        }
    }
    /**
     * @OA\Components(
     *     @OA\Schema(
     *         schema="Vehicle",
     *         @OA\Property(property="title", type="string"),
     *     @OA\Property(property="make", type="string"),
     *     @OA\Property(property="model", type="string"),
     *     @OA\Property(property="color", type="string"),
     *     @OA\Property(property="drive_type", type="string"),
     *     @OA\Property(property="transmission", type="string"),
     *     @OA\Property(property="condition", type="string"),
     *     @OA\Property(property="year", type="integer"),
     *     @OA\Property(property="mileage", type="integer"),
     *     @OA\Property(property="fuel_type", type="string"),
     *     @OA\Property(property="engine_size", type="string"),
     *     @OA\Property(property="doors", type="integer"),
     *     @OA\Property(property="cylinders", type="integer"),
     *     @OA\Property(property="VIN", type="string"),
     *     @OA\Property(property="description", type="string"),
     *     @OA\Property(property="price", type="number"),
     *     @OA\Property(property="stock_id", type="string"),
     *     @OA\Property(property="discount", type="number"),
     *     @OA\Property(property="is_featured", type="boolean"),
     *     @OA\Property(property="featured_from_date", type="string", format="date"),
     *     @OA\Property(property="featured_to_date", type="string", format="date"),
     *     @OA\Property(property="dealership_id", type="integer"),
     *     @OA\Property(property="is_sold", type="boolean"),
     *     @OA\Property(property="is_enabled", type="boolean"),
     *     @OA\Property(property="reviews", type="array", @OA\Items(type="string")),
     *     @OA\Property(property="rating", type="number"),
     *     @OA\Property(property="created_at", type="string", format="date-time"),
     *     @OA\Property(property="updated_at", type="string", format="date-time"),
     *     )
     * )
     */
}
