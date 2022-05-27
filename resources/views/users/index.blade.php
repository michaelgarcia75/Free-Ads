<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All users') }}
        </h2>
    </x-slot>

    <p class="ml-12 mt-4">
        <!-- Create new user : "posts.create" -->
        <a href="{{ route('users.create') }}" title="Créer un utilisateur">Create new user</a>
    </p>

    <!-- Show existing users -->
    <table class="ml-12 mt-4" border="1">
        <thead>
            <tr>
                <th>Login</th>
                <th colspan="2">Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <!-- Display user : "users.show" -->
                    <a href="{{ route('users.show', $user) }}" title="Voir utilisateur">{{ $user->login }}</a>
                </td>
                <td>
                    <!-- Modify user : "users.edit" -->
                    <a href="{{ route('users.edit', $user) }}" title="Modifier l'utilisateur">Modify</a>
                </td>
                <td> </td>
                <td>
                    <!-- Delete user : "users.destroy" -->
                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                        @csrf
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        @method("DELETE")
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>