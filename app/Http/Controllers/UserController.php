<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/sanctum/csrf-cookie",
     *     description="Before authentication, make a request to this endpoint to receive and enable CORS protection. It sets a 'XSRF-TOKEN'  
     *     cookie containing the current CSRF token. This token should then be passed in an X-XSRF-TOKEN header on subsequent requests.",
     *     @OA\Response(
     *         response=204,
     *         description="Successful; returns nothing"
     *     )
     * )
     */
    public function sanctum()
    {

    }

    /**
     * @OA\Post(
     *     path="/login",
     *     description="Logs in a user using valid credentials",
     *     @OA\Parameter(
     *         name="X-XSRF-TOKEN",
     *         in="header",
     *         description="for CORS protection",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="Email address to use for the login",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Password of the user",
     *                     type="string",
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid credentials"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful; returns an object containing a token which should be attached in 
     *         the header for subsequent authentication requests."
     *     ),
     * )
     */
    public function login()
    {
       
    }

    /**
     * @OA\Get(
     *     path="/logout",
     *     description="Logs out the current user.",
     *     @OA\Response(
     *         response=200,
     *         description="Successful; returns object"
     *     )
     * )
     */
    public function logout()
    {

    }
}
