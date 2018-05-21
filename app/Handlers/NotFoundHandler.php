<?php

namespace App\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\AbstractHandler;
use Slim\Http\Body;
use Slim\Views\Twig;

class NotFoundHandler extends AbstractHandler
{
	/**
	 * @var Twig
	 */
	private $view;

	public function __construct(Twig $view)
	{
		$this->view = $view;
	}

	public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {
		if ( $request->getMethod() === 'OPTIONS' ) {
			$contentType = 'text/plain';
			$output      = $this->renderPlainNotFoundOutput();
		} else {
			$contentType = $this->determineContentType($request);
			switch ( $contentType ) {
				case 'application/json':
					$output = $this->renderJsonNotFoundOutput($response);
					break;

				case 'text/xml':
				case 'application/xml':
					$output = $this->renderXmlNotFoundOutput();
					break;

				case 'text/html':
					$output = $this->renderHtmlNotFoundOutput($response);
					break;

				default:
					throw new UnexpectedValueException( 'Cannot render unknown content type ' . $contentType );
			}
		}

		$body = new Body( fopen( 'php://temp', 'r+' ) );
		$body->write( $output );

		return $response->withStatus( 404 )
		                ->withHeader( 'Content-Type', $contentType )
		                ->withBody( $body );
	}

	/**
	 * Render plain not found message
	 *
	 * @return ResponseInterface
	 */
	protected function renderPlainNotFoundOutput()
	{
		return 'Not found';
	}

	/**
	 * Return a response for text/html content not found
	 *
	 * @param ResponseInterface $response
	 *
	 * @return ResponseInterface
	 */
	protected function renderJsonNotFoundOutput(ResponseInterface $response)
	{
		return $response->withJson([
			'error' => 'Not Found'
		]);
	}

	/**
	 * Return a response for xml content not found
	 *
	 * @return ResponseInterface
	 */
	protected function renderXmlNotFoundOutput()
	{
		return '<root><message>Not found</message></root>';
	}

	/**
	 * Return a response for text/html content not found
	 *
	 * @param ResponseInterface $response
	 *
	 * @return ResponseInterface
	 */
	protected function renderHtmlNotFoundOutput(ResponseInterface $response)
	{
		return $this->view->fetch('404.twig');
	}
}