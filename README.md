# ps-mcp-server-stubs

IDE stubs for ps_mcp_server module attributes and exceptions.

Provides autocompletion and static analysis support (PHPStan, Psalm) for third-party PrestaShop modules declaring MCP tools, prompts, and resources — without requiring `mcp/sdk` or the full `ps_mcp_server` module.

## Installation

```bash
composer require --dev prestashop/ps-mcp-server-stubs
```

## Usage

```php
use PrestaShop\Module\PsMcpServer\Server\Attributes\PsMcpTool;
use PrestaShop\Module\PsMcpServer\Server\Attributes\PsMcpSchema;

class GetOrderStatus
{
    #[PsMcpTool(name: 'get_order_status', description: 'Returns the status of an order')]
    public function __invoke(
        #[PsMcpSchema(description: 'The order ID', minimum: 1)] int $orderId
    ): string {
        return Order::getStatus($orderId);
    }
}
```

Your module must declare MCP compliance:

```php
public function isMcpCompliant(): bool
{
    return true;
}
```

## What's included

- **PsMcp* attributes**: `PsMcpTool`, `PsMcpPrompt`, `PsMcpResource`, `PsMcpResourceTemplate`, `PsMcpSchema`, `PsMcpIcon`, `PsMcpToolAnnotations`, `PsMcpPromptArgument`
- **PsMcp* exceptions**: `PsMcpToolCallException`, `PsMcpPromptGetException`, `PsMcpResourceReadException`
- **SDK internals** (marked `@internal`): parent classes and types needed for IDE resolution

## Versioning

Versions follow `ps_mcp_server` releases.

## License

Proprietary — Copyright (c) PrestaShop SA. All Rights Reserved.
