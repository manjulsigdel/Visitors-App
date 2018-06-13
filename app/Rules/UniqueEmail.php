<?php

namespace App\Rules;

use App\Domain\Front\Services\Visitors\VisitorService;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class UniqueEmail
 * @package App\Rules
 */
class UniqueEmail implements Rule
{
    /**
     * @var
     */
    protected $visitorService;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email already exists.';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $visitors = $this->visitorService->getAllVisitors();
        foreach ($visitors as $visitor) {
            if ( $visitor->getEmail() === $value ) {
                return false;
            }
        }
        return true;
    }
}
