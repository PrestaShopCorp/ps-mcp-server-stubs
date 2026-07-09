<?php
/**
 * Copyright (c) 2025 PrestaShop SA
 *
 * All Rights Reserved.
 *
 * This module is proprietary software owned by PrestaShop SA. All intellectual property rights, including copyrights, trademarks, and trade secrets, are reserved by PrestaShop SA.
 *
 * The PS MCP Server module was developed by PrestaShop, which holds all associated intellectual property rights. The license granted to the user does not entail any transfer of rights. The user shall refrain from any act that may infringe upon PrestaShop's rights and undertakes to strictly comply with the limitations of the license set out below. PrestaShop grants the user a personal, non-exclusive, non-transferable, and non-sublicensable license to use the MCP Server module, worldwide and for the entire duration of use of the module. This license is strictly limited to installing the module and using it solely for the operation of the user's PrestaShop store.
 */

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