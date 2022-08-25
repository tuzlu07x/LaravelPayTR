<?php

namespace Src\PayTr;

class Response
{
    protected array $result;

    public function getResult(): array
    {
        return $this->result;
    }

    public function setResult(array $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function isSuccess(): bool
    {
        $result = $this->getResult();

        if ($result['status'] == 'success') {
            return true;
        } else {
            return false;
        }
    }

    public function isError(): bool
    {
        $result = $this->getResult();

        if ($result['status'] == 'failed') {
            return false;
        } else {
            return true;
        }
    }

    public function getMessage(): ?string
    {
        $result = $this->getResult();

        if (isset($result['reason'])) {
            return $result['reason'];
        } else {
            return 'PAYTR IFRAME failed. reason:' . null;
        }
    }
}
