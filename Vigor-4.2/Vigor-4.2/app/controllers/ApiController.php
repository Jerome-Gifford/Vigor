<?php

use \Symfony\Component\HttpFoundation\Response as IlluminateResponse;
use \Illuminate\Pagination\Paginator;

abstract class ApiController extends BaseController {

	/**
	 * @var
	 */
	protected $statusCode = IlluminateResponse::HTTP_OK;

	/**
	 * @return mixed
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @param $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @param array $data
	 * @return mixed
	 */
	protected function respond(array $data)
	{
		return Response::json($data, $this->getStatusCode());
	}

	/**
	 * @param Paginator $paginator
	 * @param array $data
	 * @return mixed
	 */
	protected function respondWithPagination(Paginator $paginator, array $data)
	{
		$data = array_merge($this->getPaginationData($paginator), $data);

		return Response::json($data, $this->getStatusCode());
	}

	/**
	 * @param string $message
	 * @return mixed
	 */
	protected function respondNotFound($message = 'Not Found.')
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
	}

	/**
	 * @param string $message
	 * @return mixed
	 */
	protected function respondSuccess($message = 'Success')
	{
		return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respondWithSuccess($message);
	}

	/**
	 * @param $message
	 * @return mixed
	 */
	private function respondWithSuccess($message)
	{
		return $this->respond([
			'status' => [
				'message' => $message,
				'code' => $this->getStatusCode()
			]
		]);
	}

	/**
	 * @param $message
	 * @return mixed
	 */
	private function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'code' => $this->getStatusCode()
			]
		]);
	}

	/**
	 * @param Paginator $paginator
	 * @return array
	 */
	private function getPaginationData(Paginator $paginator)
	{
		return [
			'pagination' => [
				'total' => $paginator->getTotal(),
				'per_page' => $paginator->getPerPage(),
				'current_page' => $paginator->getCurrentPage(),
				'last_page' => $paginator->getLastPage(),
				'from' => $paginator->getFrom(),
				'to' => $paginator->getTo()
			]
		];
	}
}