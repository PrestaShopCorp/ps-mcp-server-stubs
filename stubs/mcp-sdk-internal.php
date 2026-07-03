<?php
/**
 * @internal SDK internals — use the PsMcp* wrapper classes instead.
 */

namespace Mcp\Capability\Attribute;

/**
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class McpTool
{
    /**
     * @param string|null           $name         The name of the tool (defaults to the method name)
     * @param string|null           $title        Optional human-readable title for display in UI
     * @param string|null           $description  The description of the tool (defaults to the DocBlock/inferred)
     * @param \Mcp\Schema\ToolAnnotations|null  $annotations  Optional annotations describing tool behavior
     * @param ?\Mcp\Schema\Icon[]               $icons        Optional list of icon URLs representing the tool
     * @param ?array<string, mixed> $meta         Optional metadata
     * @param array<string, mixed>  $outputSchema Optional JSON Schema object for defining the expected output structure
     */
    public function __construct(public ?string $name = null, public ?string $title = null, public ?string $description = null, public ?\Mcp\Schema\ToolAnnotations $annotations = null, public ?array $icons = null, public ?array $meta = null, public ?array $outputSchema = null)
    {
    }
}
/**
 * Marks a PHP method as an MCP Prompt generator.
 * The method should return the prompt messages, potentially using arguments for templating.
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class McpPrompt
{
    /**
     * @param ?string               $name        overrides the prompt name (defaults to method name)
     * @param ?string               $title       Optional human-readable title for display in UI
     * @param ?string               $description Optional description of the prompt. Defaults to method DocBlock summary.
     * @param ?\Mcp\Schema\Icon[]               $icons       Optional list of icon URLs representing the prompt
     * @param ?array<string, mixed> $meta        Optional metadata
     */
    public function __construct(public ?string $name = null, public ?string $title = null, public ?string $description = null, public ?array $icons = null, public ?array $meta = null)
    {
    }
}
/**
 * Marks a PHP class as representing or handling a specific MCP Resource instance.
 * Used primarily for the 'resources/list' discovery.
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class McpResource
{
    /**
     * @param string                $uri         The specific URI identifying this resource instance. Must be unique within the server.
     * @param ?string               $name        A human-readable name for this resource. If null, a default might be generated from the method name.
     * @param ?string               $description An optional description of the resource. Defaults to class DocBlock summary.
     * @param ?string               $mimeType    the MIME type, if known and constant for this resource
     * @param ?int                  $size        the size in bytes, if known and constant
     * @param \Mcp\Schema\Annotations|null      $annotations optional annotations describing the resource
     * @param ?\Mcp\Schema\Icon[]               $icons       Optional list of icon URLs representing the resource
     * @param ?array<string, mixed> $meta        Optional metadata
     */
    public function __construct(public string $uri, public ?string $name = null, public ?string $description = null, public ?string $mimeType = null, public ?int $size = null, public ?\Mcp\Schema\Annotations $annotations = null, public ?array $icons = null, public ?array $meta = null)
    {
    }
}
/**
 * Marks a PHP class definition as representing an MCP Resource Template.
 * This is informational, used for 'resources/templates/list'.
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_CLASS)]
class McpResourceTemplate
{
    /**
     * @param string                $uriTemplate the URI template string (RFC 6570)
     * @param ?string               $name        A human-readable name for the template type.  If null, a default might be generated from the method name.
     * @param ?string               $description Optional description. Defaults to class DocBlock summary.
     * @param ?string               $mimeType    optional default MIME type for matching resources
     * @param ?\Mcp\Schema\Annotations          $annotations optional annotations describing the resource template
     * @param ?array<string, mixed> $meta        Optional metadata
     */
    public function __construct(public string $uriTemplate, public ?string $name = null, public ?string $description = null, public ?string $mimeType = null, public ?\Mcp\Schema\Annotations $annotations = null, public ?array $meta = null)
    {
    }
}
/**
 * Defines a JSON Schema for a method's input or an individual parameter.
 *
 * When used at the method level, it describes an object schema where properties
 * correspond to the method's parameters.
 *
 * When used at the parameter level, it describes the schema for that specific parameter.
 * If 'type' is omitted at the parameter level, it will be inferred.
 *
 * @phpstan-type SchemaAttributeData array{
 *     definition?: array<string, mixed>,
 *     type?: string,
 *     description?: string,
 *     enum?: array<int, int|float|string|null>,
 *     format?: string,
 *     minLength?: int,
 *     maxLength?: int,
 *     pattern?: string,
 *     minimum?: int,
 *     maximum?: int,
 *     exclusiveMinimum?: int,
 *     exclusiveMaximum?: int,
 *     multipleOf?: int|float,
 *     items?: array<string, mixed>,
 *     minItems?: int,
 *     maxItems?: int,
 *     uniqueItems?: bool,
 *     properties?: array<string, mixed>,
 *     required?: array<int, string>,
 *     additionalProperties?: bool|array<string, mixed>,
 * }
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::TARGET_PARAMETER)]
class Schema
{
    /**
     * The complete JSON schema array.
     * If provided, it takes precedence over individual properties like $type, $properties, etc.
     *
     * @var ?array<string, mixed>
     */
    public ?array $definition = null;
    /**
     * Alternatively, provide individual top-level schema keywords.
     * These are used if $definition is null.
     */
    public ?string $type = null;
    public ?string $description = null;
    public mixed $default = null;
    /**
     * @var ?array<int, int|float|string|null>
     */
    public ?array $enum = null;
    // list of allowed values
    public ?string $format = null;
    // e.g., 'email', 'date-time'
    // Constraints for string
    public ?int $minLength = null;
    public ?int $maxLength = null;
    public ?string $pattern = null;
    // Constraints for number/integer
    public int|float|null $minimum = null;
    public int|float|null $maximum = null;
    public ?bool $exclusiveMinimum = null;
    public ?bool $exclusiveMaximum = null;
    public int|float|null $multipleOf = null;
    // Constraints for array
    /**
     * @var ?array<string, mixed>
     */
    public ?array $items = null;
    // JSON schema for array items
    public ?int $minItems = null;
    public ?int $maxItems = null;
    public ?bool $uniqueItems = null;
    // Constraints for object (primarily used when Schema is on a method or an object-typed parameter)
    /**
     * @var ?array<string, mixed>
     */
    public ?array $properties = null;
    // [propertyName => [schema array], ...]
    /**
     * @var ?array<int, string>
     */
    public ?array $required = null;
    // [propertyName, ...]
    /**
     * @var bool|array<string, mixed>|null
     */
    public bool|array|null $additionalProperties = null;
    // true, false, or a schema array
    /**
     * @param ?array<string, mixed>              $definition           A complete JSON schema array. If provided, other parameters are ignored.
     * @param ?string                            $type                 the JSON schema type
     * @param ?string                            $description          description of the element
     * @param ?array<int, int|float|string|null> $enum                 allowed enum values
     * @param ?string                            $format               String format (e.g., 'date-time', 'email').
     * @param ?int                               $minLength            minimum length for strings
     * @param ?int                               $maxLength            maximum length for strings
     * @param ?string                            $pattern              regex pattern for strings
     * @param int|float|null                     $minimum              minimum value for numbers/integers
     * @param int|float|null                     $maximum              maximum value for numbers/integers
     * @param ?bool                              $exclusiveMinimum     exclusive minimum
     * @param ?bool                              $exclusiveMaximum     exclusive maximum
     * @param int|float|null                     $multipleOf           must be a multiple of this value
     * @param ?array<string, mixed>              $items                JSON Schema for items if type is 'array'
     * @param ?int                               $minItems             minimum items for an array
     * @param ?int                               $maxItems             maximum items for an array
     * @param ?bool                              $uniqueItems          whether array items must be unique
     * @param ?array<string, mixed>              $properties           Property definitions if type is 'object'. [name => schema_array].
     * @param ?array<int, string>                $required             list of required properties for an object
     * @param bool|array<string, mixed>|null     $additionalProperties policy for additional properties in an object
     */
    public function __construct(?array $definition = null, ?string $type = null, ?string $description = null, ?array $enum = null, ?string $format = null, ?int $minLength = null, ?int $maxLength = null, ?string $pattern = null, int|float|null $minimum = null, int|float|null $maximum = null, ?bool $exclusiveMinimum = null, ?bool $exclusiveMaximum = null, int|float|null $multipleOf = null, ?array $items = null, ?int $minItems = null, ?int $maxItems = null, ?bool $uniqueItems = null, ?array $properties = null, ?array $required = null, bool|array|null $additionalProperties = null)
    {
    }
    /**
     * Converts the attribute's definition to a JSON schema array.
     *
     * @return SchemaAttributeData
     */
    public function toArray() : array
    {
    }
}
/**
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_PARAMETER)]
class CompletionProvider
{
    /**
     * @param class-string<\Mcp\Capability\Completion\ProviderInterface>|\Mcp\Capability\Completion\ProviderInterface|null $provider if a class-string, it will be resolved
     *                                                                         from the container at the point of use
     * @param ?array<int, int|float|string>                          $values   a list of values to use for completion
     */
    public function __construct(public ?string $providerClass = null, public string|\Mcp\Capability\Completion\ProviderInterface|null $provider = null, public ?array $values = null, public ?string $enum = null)
    {
    }
}
namespace Mcp\Schema;

/**
 * Additional properties describing a Tool to clients.
 * NOTE: all properties in ToolAnnotations are hints.
 *
 * @phpstan-type ToolAnnotationsData array{
 *     title?: string,
 *     readOnlyHint?: bool,
 *     destructiveHint?: bool,
 *     idempotentHint?: bool,
 *     openWorldHint?: bool,
 * }
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
class ToolAnnotations implements \JsonSerializable
{
    /**
     * @param ?string $title           a human-readable title for the tool — deprecated for display in favor of `Mcp\Schema\Tool::$title` per MCP spec revision 2025-06-18; retained for backward compatibility
     * @param ?bool   $readOnlyHint    if true, the tool does not modify its environment
     * @param ?bool   $destructiveHint If true, the tool may perform destructive updates to its environment. If false, the tool performs only additive updates.
     * @param ?bool   $idempotentHint  If true, calling the tool repeatedly with the same arguments will have no additional effect on the its environment. (This property is meaningful only when `readOnlyHint == false`)
     * @param ?bool   $openWorldHint   If true, this tool may interact with an "open world" of external entities. If false, the tool's domain of interaction is closed. For example, the world of a web search tool is open, whereas that of a memory tool is not.
     */
    public function __construct(public readonly ?string $title = null, public readonly ?bool $readOnlyHint = null, public readonly ?bool $destructiveHint = null, public readonly ?bool $idempotentHint = null, public readonly ?bool $openWorldHint = null)
    {
    }
    /**
     * @param ToolAnnotationsData $data
     */
    public static function fromArray(array $data) : self
    {
    }
    /**
     * @return ToolAnnotationsData
     */
    public function jsonSerialize() : array
    {
    }
}
/**
 * A url pointing to an icon URL or a base64-encoded data URI.
 *
 * @phpstan-type IconData array{
 *     src: string,
 *     mimeType?: string,
 *     sizes?: string[],
 * }
 *
 * @author Christopher Hertel <mail@christopher-hertel.de>
 */
class Icon implements \JsonSerializable
{
    /**
     * @param string    $src      a standard URI pointing to an icon resource
     * @param ?string   $mimeType optional override if the server's MIME type is missing or generic
     * @param ?string[] $sizes    optional array of strings that specify sizes at which the icon can be used.
     *                            Each string should be in WxH format (e.g., `"48x48"`, `"96x96"`) or `"any"` for
     *                            scalable formats like SVG.
     */
    public function __construct(public readonly string $src, public readonly ?string $mimeType = null, public readonly ?array $sizes = null)
    {
    }
    /**
     * @param IconData $data
     */
    public static function fromArray(array $data) : self
    {
    }
    /**
     * @return IconData
     */
    public function jsonSerialize() : array
    {
    }
}
/**
 * Describes an argument that a prompt can accept.
 *
 * @phpstan-type PromptArgumentData array{
 *     name: string,
 *     description?: string,
 *     required?: bool,
 * }
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
class PromptArgument implements \JsonSerializable
{
    /**
     * @param string      $name        the name of the argument
     * @param string|null $description a human-readable description of the argument
     * @param bool|null   $required    Whether this argument must be provided. Defaults to false per MCP spec if omitted.
     */
    public function __construct(public readonly string $name, public readonly ?string $description = null, public readonly ?bool $required = null)
    {
    }
    /**
     * @param PromptArgumentData $data
     */
    public static function fromArray(array $data) : self
    {
    }
    /**
     * @return PromptArgumentData
     */
    public function jsonSerialize() : array
    {
    }
}
/**
 * Optional annotations for the client. The client can use annotations
 * to inform how objects are used or displayed.
 *
 * @phpstan-type AnnotationsData array{
 *     audience?: string[],
 *     priority?: float
 * }
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
class Annotations implements \JsonSerializable
{
    /**
     * @param \Mcp\Schema\Enum\Role[]|null $audience Describes who the intended customer of this object or data is.
     *
     *  It can include multiple entries to indicate content useful for multiple audiences (e.g., `[Role::User, Role::Assistant]`).
     * @param float|null $priority Describes how important this data is for operating the server.
     *
     * A value of 1 means "most important," and indicates that the data is
     * effectively required, while 0 means "least important," and indicates that
     * the data is entirely optional.
     */
    public function __construct(public readonly ?array $audience = null, public readonly ?float $priority = null)
    {
    }
    /**
     * @param AnnotationsData $data
     */
    public static function fromArray(array $data) : self
    {
    }
    /**
     * @return AnnotationsData
     */
    public function jsonSerialize() : array
    {
    }
}
namespace Mcp\Schema\Enum;

/**
 * The sender or recipient of messages and data in a conversation.
 *
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
enum Role : string
{
    case User = 'user';
    case Assistant = 'assistant';
}
namespace Mcp\Capability\Completion;

/**
 * @author Kyrian Obikwelu <koshnawaza@gmail.com>
 */
interface ProviderInterface
{
    /**
     * Get completions for a given current value.
     *
     * @param string $currentValue the current value to get completions for
     *
     * @return string[] the completions
     */
    public function getCompletions(string $currentValue) : array;
}
namespace Mcp\Exception;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
interface ExceptionInterface extends \Throwable
{
}
/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class ToolCallException extends \RuntimeException implements \Mcp\Exception\ExceptionInterface
{
}
/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class PromptGetException extends \RuntimeException implements \Mcp\Exception\ExceptionInterface
{
}
/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class ResourceReadException extends \RuntimeException implements \Mcp\Exception\ExceptionInterface
{
}