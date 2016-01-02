<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('sessions')->delete();
        
		\DB::table('sessions')->insert(array (
			0 => 
			array (
				'id' => '41875c79f5e738850af56d7540df65bda5039e37',
				'payload' => 'YToxMjp7czo2OiJfdG9rZW4iO3M6NDA6InZmRkVBNmdDRDNnazBUNDhhRnhmaGMxOUZ5VE5XV2x1eENNNXZ6RTgiO3M6NjoidGhlbWVzIjtzOjU6InN4aW1vIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovL2xhcmF2ZWw1Mi5pby9zeGltby9tZW51Ijt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM4OiJsb2dpbl84MmU1ZDJjNTZiZGQwODExMzE4ZjBjZjA3OGI3OGJmYyI7aToxO3M6MzoidWlkIjtpOjE7czozOiJnaWQiO2k6MTtzOjM6ImVpZCI7czoxOToic3VwZXJhZG1pbkBtYWlsLmNvbSI7czoyOiJsbCI7czoxOToiMjAxNS0wNy0xOSAwNTowMzo0NyI7czozOiJmaWQiO3M6MTA6IlJvb3QgQWRtaW4iO3M6NDoibGFuZyI7czoyOiJlbiI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NDk4NTgwMDI7czoxOiJjIjtpOjE0NDk4NTc2NzI7czoxOiJsIjtzOjE6IjAiO319',
				'last_activity' => 1449858002,
			),
			1 => 
			array (
				'id' => 'a1152999471750c642c6448147d7c89313729b53',
				'payload' => 'YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6Ik1wYkZ6SHpXanlpVWV0ZktSMW9qaG10VjdUbkxqbU5ndmYzZks2Y3oiO3M6Mzg6ImxvZ2luXzgyZTVkMmM1NmJkZDA4MTEzMThmMGNmMDc4Yjc4YmZjIjtpOjE7czozOiJ1aWQiO2k6MTtzOjM6ImdpZCI7aToxO3M6MzoiZWlkIjtzOjE5OiJzdXBlcmFkbWluQG1haWwuY29tIjtzOjI6ImxsIjtzOjE5OiIyMDE1LTA3LTE5IDA1OjAzOjQ3IjtzOjM6ImZpZCI7czoxMDoiUm9vdCBBZG1pbiI7czo2OiJ0aGVtZXMiO3M6MTY6InN4aW1vLWxpZ2h0LWJsdWUiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vbG9jYWxob3N0L3N4aW1vNS9zeGltbzUxL3B1YmxpYy9zeGltby9jb25maWcvbG9nIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQzODA0OTI4NDtzOjE6ImMiO2k6MTQzODA0MzcwNztzOjE6ImwiO3M6MToiMCI7fX0=',
				'last_activity' => 1438049285,
			),
		));
	}

}
