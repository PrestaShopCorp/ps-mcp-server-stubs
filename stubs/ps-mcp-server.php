<?php

namespace PrestaShop\Module\PsMcpServer\Server\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class PsMcpTool extends \Mcp\Capability\Attribute\McpTool
{
}
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class PsMcpPrompt extends \Mcp\Capability\Attribute\McpPrompt
{
}
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class PsMcpResource extends \Mcp\Capability\Attribute\McpResource
{
}
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
final class PsMcpResourceTemplate extends \Mcp\Capability\Attribute\McpResourceTemplate
{
}
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PARAMETER)]
class PsMcpSchema extends \Mcp\Capability\Attribute\Schema
{
}
class PsMcpIcon extends \Mcp\Schema\Icon
{
}
class PsMcpToolAnnotations extends \Mcp\Schema\ToolAnnotations
{
}
class PsMcpPromptArgument extends \Mcp\Schema\PromptArgument
{
}
namespace PrestaShop\Module\PsMcpServer\Server\Exceptions;

/**
 * Wrapper for the MCP SDK ToolCallException.
 *
 * The SDK class is declared `final` and cannot be extended.
 * This class delegates to the SDK exception via its constructor,
 * so the idiomatic usage is: `throw new PsMcpToolCallException($message, $exitCode);`
 */
class PsMcpToolCallException
{
    /**
     * @param string $message A human-readable error description sent to the AI agent
     * @param int $exitCode A numeric exit code indicating the type of error
     * @param \Throwable|null $previous An optional previous exception for chaining
     *
     * @throws \Mcp\Exception\ToolCallException
     */
    public function __construct(string $message, int $exitCode, ?\Throwable $previous = null)
    {
    }
}
/**
 * Wrapper for the MCP SDK PromptGetException.
 *
 * The SDK class is declared `final` and cannot be extended.
 * This class delegates to the SDK exception via its constructor,
 * so the idiomatic usage is: `throw new PsMcpPromptGetException($message, $exitCode);`
 */
class PsMcpPromptGetException
{
    /**
     * @param string $message A human-readable error description sent to the AI agent
     * @param int $exitCode A numeric exit code indicating the type of error
     * @param \Throwable|null $previous An optional previous exception for chaining
     *
     * @throws \Mcp\Exception\PromptGetException
     */
    public function __construct(string $message, int $exitCode, ?\Throwable $previous = null)
    {
    }
}
/**
 * Wrapper for the MCP SDK ResourceReadException.
 *
 * The SDK class is declared `final` and cannot be extended.
 * This class delegates to the SDK exception via its constructor,
 * so the idiomatic usage is: `throw new PsMcpResourceReadException($message, $exitCode);`
 */
class PsMcpResourceReadException
{
    /**
     * @param string $message A human-readable error description sent to the AI agent
     * @param int $exitCode A numeric exit code indicating the type of error
     * @param \Throwable|null $previous An optional previous exception for chaining
     *
     * @throws \Mcp\Exception\ResourceReadException
     */
    public function __construct(string $message, int $exitCode, ?\Throwable $previous = null)
    {
    }
}